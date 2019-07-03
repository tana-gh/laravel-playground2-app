<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DataProvider\RegisterReviewProviderInterface;
use App\Foundation\ElasticsearchClient;
use App\DataProvider\Database\RegisterReviewDataProvider;
use App\DataProvider\AddReviewIndexProviderInterface;
use App\DataProvider\Elasticsearch\AddReviewIndexDataProvider;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegisterReviewProviderInterface::class, function () {
            return new RegisterReviewDataProvider();
        });

        $this->app->bind(ElasticsearchClient::class, function (Application $app) {
            $config = $app['config']->get('elasticsearch');
            return new ElasticsearchClient($config['hosts']);
        });

        $this->app->bind(AddReviewIndexProviderInterface::class, function (Application $app) {
            $client = $app->make(ElasticsearchClient::class);
            return new AddReviewIndexDataProvider($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
