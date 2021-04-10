package com.am.asm;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.os.Bundle;

import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;
import com.github.mikephil.charting.formatter.IndexAxisValueFormatter;
import com.github.mikephil.charting.interfaces.datasets.IBarDataSet;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ChartActivity extends AppCompatActivity {

    BarChart bar;
    List<BarEntry>list;
    List<BarEntry> list2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chart);

        bar = findViewById(R.id.barchart);

        list=new ArrayList<>();
        list2=new ArrayList<>();

        //Add data for the first group
        list.add(new BarEntry(1,12));
        list.add(new BarEntry(2,11));
        list.add(new BarEntry(3,14));
        list.add(new BarEntry(4,16));
        list.add(new BarEntry(5,10));

        //Add data for the second group
        list2.add(new BarEntry(1,8));
        list2.add(new BarEntry(2,6));
        list2.add(new BarEntry(3,10));
        list2.add(new BarEntry(4,14));
        list2.add(new BarEntry(5,9));

        BarDataSet barDataSet=new BarDataSet(list,"male");
        barDataSet.setColor(Color.RED);        //Set the color for the first group of columns
        BarDataSet barDataSet2=new BarDataSet(list2,"Female");
        barDataSet2.setColor(Color.BLUE);      //Set the color for the second group of columns
        BarData barData=new BarData(barDataSet);      //Add the first group

        //Key! ! ! Add the second group (multiple groups can also use the same method) must be added in descending order of data size
        barData.addDataSet(barDataSet2);

        bar.setData(barData);

        barData.setBarWidth(0.2f);//The width of the column


        XAxis xAxis = bar.getXAxis();
        xAxis.setDrawGridLines(false);
//        xAxis.setValueFormatter(new IndexAxisValueFormatter(names));
        //set angle rotation of X axis
        xAxis.setLabelRotationAngle(-13);
        xAxis.setPosition(XAxis.XAxisPosition.BOTTOM);
        bar.getDescription().setEnabled(false);
        bar.getViewPortHandler().setMaximumScaleX(20f);
        bar.setData(barData);
        bar.setFitBars(false);
        bar.setScaleYEnabled(false);
        bar.animateXY(1000, 1000);
        bar.invalidate();
    }
}