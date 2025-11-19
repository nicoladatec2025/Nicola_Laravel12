<?php

namespace App\Http\Controllers;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class NewsController extends Controller
{
    /**
     * Listagem pública de notícias
     */
    public function index(Request $request)
    {
        try {
            $query = News::published()
                        ->with('user')
                        ->orderBy('published_at', 'desc');
            // Filtro de busca
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('summary', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });

                Log::info('Busca de notícias realizada', [
                    'search_term' => $search,
                    'results_count' => $query->count()
                ]);
            }
            $news = $query->paginate(12);
            return view('news.index', compact('news'));
        } catch (\Exception $e) {
            Log::error('Erro ao listar notícias públicas', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Erro ao carregar notícias. Tente novamente.');
        }
    }
    /**
     * Exibir notícia individual
     */
    public function show($slug)
    {
        try {
            $news = News::published()
                       ->where('slug', $slug)
                       ->firstOrFail();
            // Notícias relacionadas
            $relatedNews = News::published()
                              ->where('id', '!=', $news->id)
                              ->latest('published_at')
                              ->limit(3)
                              ->get();
            Log::info('Notícia visualizada', [
                'news_id' => $news->id,
                'news_title' => $news->title,
                'ip' => request()->ip()
            ]);
            return view('news.show', compact('news', 'relatedNews'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('Notícia não encontrada', [
                'slug' => $slug,
                'ip' => request()->ip()
            ]);
            return abort(404, 'Notícia não encontrada');
        } catch (\Exception $e) {
            Log::error('Erro ao exibir notícia', [
                'slug' => $slug,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Erro ao carregar notícia. Tente novamente.');
        }
    }
}
