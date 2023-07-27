package com.example.signin;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.os.Bundle;
import android.os.Looper;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;


import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationResult;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.material.textfield.TextInputLayout;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ProfileActivity extends AppCompatActivity {
    TextInputLayout etName, etEmail;
    TextInputLayout tvaddress;
    TextView tvcoords;
    private LocationCallback locationCallback;
    LocationRequest locationRequest;
    RequestQueue queue;
    final String URL = "http://192.168.0.134/location/api.php";

    String[] perms = {"android.permission.ACCESS_FINE_LOCATION",
            "android.permission.ACCESS_COARSE_LOCATION",
            "android.permission.ACCESS_NETWORK_STATE"};

    private FusedLocationProviderClient fusedLocationClient;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        tvcoords = (TextView) findViewById(R.id.tvcoords);
        tvaddress = (TextInputLayout) findViewById(R.id.tvaddress);
        fusedLocationClient = LocationServices.getFusedLocationProviderClient(this);

        //check permission
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, perms, 200);

            return;
        }

        locationRequest = LocationRequest.create();

        locationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
        locationRequest.setInterval(10 * 1000); //in milisec
        locationRequest.setFastestInterval(2000);


        locationCallback = new LocationCallback() {
            public void onLocationResult(LocationResult locationResult) {
                if (locationResult == null) {
                    Toast.makeText(getApplicationContext(), "Unable detect location", Toast.LENGTH_SHORT).show();
                    return;
                }
                for (Location location : locationResult.getLocations()) {
                    // Update UI with location data
                    double lat = location.getLatitude();
                    double lon = location.getLongitude();

                    tvcoords.setText("" + lat + "," + lon);
                    Geocoder geocoder = new Geocoder(getApplicationContext());
                    List<Address> addressList = null;
                    try {
                        addressList = geocoder.getFromLocation(lat,lon,1);

                        Address address = addressList.get(0);

                        String line = address.getAddressLine(0);
                        String area = address.getAdminArea();
                        String locality = address.getLocality();
                        String country = address.getCountryName();
                        String postcode = address.getPostalCode();


                        tvaddress.getEditText().setText(line+" "+area+" "+locality+" "+postcode+" "+country);

                    } catch (IOException e) {
                        e.printStackTrace();
                    }


                }

            }
        };


        fusedLocationClient.getLastLocation().addOnSuccessListener(this, new OnSuccessListener<Location>() {
            @Override
            public void onSuccess(Location location) {
                double lat = location.getLatitude();
                double lon = location.getLongitude();

                tvcoords.setText("" + lat + "," + lon);

            }
        });


        queue = Volley.newRequestQueue(getApplicationContext());

        etName = (TextInputLayout) findViewById(R.id.etName);
        etEmail = (TextInputLayout) findViewById(R.id.etEmail);

        Button button = (Button) findViewById(R.id.btnSubmit);

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //volley call

                makeRequest();

            }

        });

    }

    public void makeRequest(){
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Toast.makeText(getApplicationContext(),response,Toast.LENGTH_LONG).show();

            }
        }, errorListener) {
            @Override
            protected Map<String,String> getParams (){
                Map <String, String> params = new HashMap<>();

                params.put("name", etName.getEditText().getText().toString());
                params.put("email", etEmail.getEditText().getText().toString());
                params.put("location", tvaddress.getEditText().getText().toString());
                params.put("coordinate", tvcoords.getText().toString());

                return params;

            }

        };

        queue.add(stringRequest);
    }

    public Response.ErrorListener errorListener = new Response.ErrorListener() {
        @Override
        public void onErrorResponse(VolleyError error) {
            Toast.makeText(getApplicationContext(),error.getMessage(),Toast.LENGTH_LONG).show();

        }
    };
    @Override
    protected void onResume() {
        super.onResume();
        startLocationUpdates();
    }

    public void startLocationUpdates() {
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, perms, 200);
            return;
        }
        fusedLocationClient.requestLocationUpdates(locationRequest,
                locationCallback,
                Looper.getMainLooper());

    }


}