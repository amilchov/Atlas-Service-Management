package com.am.asm.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class BigPanda {

    @SerializedName("charts")
    @Expose
    List<Charts> charts;

    public List<Charts> getCharts() {
        return charts;
    }
}
