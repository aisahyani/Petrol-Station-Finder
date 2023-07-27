package com.example.signin;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;

import com.google.android.gms.auth.api.signin.GoogleSignInClient;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;


public class RahsiaActivity extends AppCompatActivity implements View.OnClickListener {
    CardView cardView1,cardView2, cardView3, cardView4 ;
    GoogleSignInClient mGoogleSignInClient;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rahsia);

        TextView tvName = (TextView) findViewById(R.id.tvname);
        //TextView tvEmail = (TextView) findViewById(R.id.tvemail);

        String name = getIntent().getStringExtra("Name");
        //String email = getIntent().getStringExtra("Email");

        tvName.setText(name);
        //tvEmail.setText(email);

        cardView1 = (CardView) findViewById(R.id.cardView1);
        cardView2 = (CardView) findViewById(R.id.cardView2);
        cardView3 = (CardView) findViewById(R.id.cardView3);
        cardView4 = (CardView) findViewById(R.id.cardView4);

        ImageButton signout = findViewById(R.id.signout);
        signout.setOnClickListener(this);


        cardView1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(),ProfileActivity.class);
                startActivity(i);

            }
        });
        cardView2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(),MapsActivity.class);
                startActivity(i);

            }
        });
        cardView3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(),about.class);
                startActivity(i);

            }
        });
        cardView4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(),MapsActivity2.class);
                startActivity(i);

            }
        });

    }

        public void onClick(View v) {
            switch (v.getId()){
                case R.id.signout:
                    mGoogleSignInClient.signOut();
                    break;
            }
        }

        private void signOut() {
            mGoogleSignInClient.signOut()
                    .addOnCompleteListener(this, new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            finish();
                        }
                    });
        }
        

        }
