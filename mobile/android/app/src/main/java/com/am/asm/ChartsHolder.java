package com.am.asm;

import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

/**
 * @author Created by Aleks Vasilev Milchov
 */
public class ChartsHolder extends RecyclerView.ViewHolder{

    public TextView textViewCard;
    public CardView cardView;
    public ImageView imageView;
    public LinearLayout linearLayout;

    public ChartsHolder(@NonNull View itemView) {
        super(itemView);
        textViewCard = itemView.findViewById(R.id.tv_title);
        cardView = itemView.findViewById(R.id.cardView);
        imageView = itemView.findViewById(R.id.imageView);
        linearLayout = itemView.findViewById(R.id.linearLayout);
    }
}