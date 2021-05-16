package com.am.asm.adapter;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.am.asm.holder.ChartsHolder;
import com.am.asm.R;
import com.am.asm.model.Charts;
import com.am.asm.ui.activity.ChartActivity;
import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class ChartsAdapter extends RecyclerView.Adapter<ChartsHolder>{

    private List<Charts> chartsList;
    private Context context;
    private Bundle bundle;

    public ChartsAdapter(List<Charts> charts, Context context) {
        this.chartsList = charts;
        this.context = context;
    }

    @NonNull
    @Override
    public ChartsHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_item_charts, parent, false);
        return new ChartsHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ChartsHolder holder, int position) {
        Charts entry = chartsList.get(position);
        holder.textViewCard.setText(entry.getName());
        Picasso.get().load(entry.getImageLink()).into(holder.imageView);

        holder.linearLayout.setOnClickListener(v -> {
            Intent intent = new Intent(context, ChartActivity.class);
            bundle = new Bundle();
            bundle.putString("grafana_link", entry.getGrafanaLink());
            intent.putExtras(bundle);
            v.getContext().startActivity(intent);
        });

    }

    @Override
    public int getItemCount() {
        return chartsList.size();
    }
}