package com.example.signin;

import androidx.appcompat.app.AppCompatActivity;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.text.method.LinkMovementMethod;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import android.os.Bundle;

public class about extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about);
        setupHyperlink();

    }

    public void viewaboutus() {
        Intent intent = new Intent(this, about.class);
        startActivity(intent);
    }

    private void setupHyperlink() {
        TextView linkTextView = findViewById(R.id.hyperlink);
        linkTextView.setMovementMethod(LinkMovementMethod.getInstance());
    }
}