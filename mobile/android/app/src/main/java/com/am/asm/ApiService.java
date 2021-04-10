package com.am.asm;

import java.util.List;

import io.reactivex.Observable;
import retrofit2.Response;
import retrofit2.http.GET;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public interface ApiService {

    @GET("charts")
    Observable<Response<List<Charts>>>
    aggregatedDataCharts();
}
