package com.am.asm.retrofit;

import com.google.gson.GsonBuilder;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.logging.HttpLoggingInterceptor;
import retrofit2.Retrofit;
import retrofit2.adapter.rxjava2.RxJava2CallAdapterFactory;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class ApiClient {
    private static Retrofit retrofit = null;

    private static OkHttpClient httpClient = new OkHttpClient.Builder()
            //Here we can add Interceptor for dynamical adding headers
            .addNetworkInterceptor(chain -> {
                Request request = chain.request()
                        .newBuilder()
                        .header("Accept", " application/json")
                        .header("Application" , "d59ba6a4-1b9a-4ded-a8fa-f6ed24eed579")
                        .build();

                return chain.proceed(request);
            })
            //Here we adding Interceptor for full level logging
            .addNetworkInterceptor(new HttpLoggingInterceptor().setLevel(HttpLoggingInterceptor.Level.BODY))
            .build();

    public static Retrofit getClient(String baseUrl) {
        if (retrofit == null) {
            retrofit = new Retrofit.Builder()
                    .baseUrl(baseUrl)
                    .client(httpClient)
                    .addCallAdapterFactory(RxJava2CallAdapterFactory.create())
                    .addConverterFactory(GsonConverterFactory.create(new GsonBuilder().serializeNulls().create()))
                    .build();
        }
        return retrofit;
    }
}