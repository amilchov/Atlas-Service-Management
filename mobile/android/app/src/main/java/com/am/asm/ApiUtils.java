package com.am.asm;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class ApiUtils{

    private static final String BASE_URL = "https://atlas.noit.eu/api/";

    public static ApiService getService() {
        return ApiClient.getClient(BASE_URL).create(ApiService.class);
    }
}