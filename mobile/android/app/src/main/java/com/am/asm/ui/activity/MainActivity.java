package com.am.asm.ui.activity;

import android.os.Bundle;
import android.util.Log;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.am.asm.adapter.ChartsAdapter;
import com.am.asm.R;
import com.am.asm.model.BigPanda;
import com.am.asm.model.Charts;
import com.am.asm.retrofit.ApiService;
import com.am.asm.retrofit.ApiUtils;

import java.util.List;

import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.schedulers.Schedulers;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    private RecyclerView recyclerView;
    private CompositeDisposable compositeDisposable;
    private ApiService apiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        recyclerView = findViewById(R.id.recyclerView);
        apiService = ApiUtils.getService();
        compositeDisposable = new CompositeDisposable();

        createRequest();
    }

    private void createRequest() {
        compositeDisposable.add(
                apiService.aggregatedDataCharts()
                        .observeOn(AndroidSchedulers.mainThread())
                        .subscribeOn(Schedulers.io())
                        .subscribe(this::handleChartsDataResponse, throwable -> {})
        );
    }

    private void handleChartsDataResponse(Response<BigPanda> listResponse) {
        if(listResponse.isSuccessful()) {
            List<Charts> charts = listResponse.body().getCharts();
            Log.i("chartsss", listResponse.body().toString());
            initRecyclerView(charts);
        }
    }

    private void initRecyclerView(List<Charts> charts) {
        ChartsAdapter adapter = new ChartsAdapter(charts, MainActivity.this);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
        recyclerView.setItemViewCacheSize(0);
        recyclerView.setAdapter(adapter);
    }
}