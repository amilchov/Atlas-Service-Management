package com.am.asm;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class ChartsAdapter extends RecyclerView.Adapter<ChartsHolder>{

    private List<Charts> chartsList;
    private Context context;

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
        System.out.println(entry.getImageLink());

        holder.linearLayout.setOnClickListener(v -> {
            Toast.makeText(v.getContext(), entry.getTag(), Toast.LENGTH_SHORT).show();
            v.getContext().startActivity(new Intent(context, ChartActivity.class));
        });

    }

    @Override
    public int getItemCount() {
        return chartsList.size();
    }
}