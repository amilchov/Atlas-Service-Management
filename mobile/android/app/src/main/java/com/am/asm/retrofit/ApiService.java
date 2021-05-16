package com.am.asm.retrofit;

import com.am.asm.model.BigPanda;

import io.reactivex.Observable;
import okhttp3.ResponseBody;
import retrofit2.Response;
import retrofit2.http.GET;
import retrofit2.http.Url;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public interface ApiService {

    @GET("charts")
    Observable<Response<BigPanda>> aggregatedDataCharts();

    @GET
    Observable<Response<ResponseBody>> bigPandaData(@Url String link);
}
