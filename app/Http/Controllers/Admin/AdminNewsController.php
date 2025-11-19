<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AdminNewsController extends Controller
{

    /**
     * Listagem administrativa
     */
    public function index(Request $request)
    {
        try {
            $query = News::with('user')->orderBy('created_at', 'desc');
            // Filtros
            if ($request->has('status')) {
                if ($request->status === 'published') {
                    $query->where('is_published', true);
                } elseif ($request->status === 'draft') {
                    $query->where('is_published', false);
                }
            }
            if ($request->has('search')) {
                $search = $request->search;
                $query->where('title', 'like', "%{$search}%");
            }
            $news = $query->paginate(15);
            Log::info('Admin acessou listagem de notícias', [
                'user_id' => Auth::id(),
                'filters' => $request->all()
            ]);
            return view('admin.news.index', compact('news'));
        } catch (\Exception $e) {
            Log::error('Erro ao listar notícias no admin', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Erro ao carregar notícias.');
        }
    }
    /**
     * Formulário de criação
     */
    public function create()
    {
        try {
            return view('admin.news.create');
        } catch (\Exception $e) {
            Log::error('Erro ao acessar formulário de criação', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Erro ao acessar formulário.');
        }
    }
    /**
     * Salvar nova notícia
     */
    public function store(NewsRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::id();

            // Gerar slug se não fornecido
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['title']);
            }
            // Upload de imagem
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('news', 'public');
                $data['image'] = $imagePath;
            }
            // Se publicado, definir data de publicação
            if ($data['is_published'] && empty($data['published_at'])) {
                $data['published_at'] = now();
            }
            $news = News::create($data);
            Log::info('Nova notícia criada', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'title' => $news->title
            ]);
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Notícia criada com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validação falhou ao criar notícia', [
                'user_id' => Auth::id(),
                'errors' => $e->errors()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Erro ao criar notícia', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()
                ->withInput()
                ->with('error', 'Erro ao criar notícia. Tente novamente.');
        }
    }
    /**
     * Formulário de edição
     */
    public function edit(News $news)
    {
        try {
            return view('admin.news.edit', compact('news'));
        } catch (\Exception $e) {
            Log::error('Erro ao acessar formulário de edição', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Erro ao acessar formulário de edição.');
        }
    }
    /**
     * Atualizar notícia
     */
    public function update(NewsRequest $request, News $news)
    {
        try {
            $data = $request->validated();
            // Upload de nova imagem
            if ($request->hasFile('image')) {
                // Deletar imagem antiga
                if ($news->image) {
                    Storage::disk('public')->delete($news->image);
                }

                $imagePath = $request->file('image')->store('news', 'public');
                $data['image'] = $imagePath;
            }
            // Atualizar data de publicação se necessário
            if ($data['is_published'] && !$news->is_published && empty($data['published_at']))
{
                $data['published_at'] = now();
            }
            $news->update($data);
            Log::info('Notícia atualizada', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'changes' => $news->getChanges()
            ]);
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Notícia atualizada com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validação falhou ao atualizar notícia', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'errors' => $e->errors()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar notícia', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()
                ->withInput()
                ->with('error', 'Erro ao atualizar notícia. Tente novamente.');
        }
    }
    /**
     * Deletar notícia
     */
    public function destroy(News $news)
    {
        try {
            // Deletar imagem associada
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $newsId = $news->id;
            $newsTitle = $news->title;

            $news->delete();
            Log::info('Notícia deletada', [
                'news_id' => $newsId,
                'news_title' => $newsTitle,
                'user_id' => Auth::id()
            ]);
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Notícia deletada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao deletar notícia', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Erro ao deletar notícia. Tente novamente.');
        }
    }
    /**
     * Alternar status de publicação
     */
    public function togglePublish(News $news)
    {
        try {
            $news->is_published = !$news->is_published;

            if ($news->is_published && !$news->published_at) {
                $news->published_at = now();
            }

            $news->save();
            Log::info('Status de publicação alterado', [
                'news_id' => $news->id,
                'is_published' => $news->is_published,
                'user_id' => Auth::id()
            ]);
            $message = $news->is_published ? 'Notícia publicada!' : 'Notícia despublicada!';
            return back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Erro ao alterar status de publicação', [
                'news_id' => $news->id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Erro ao alterar status. Tente novamente.');
        }
    }
}
