package com.example.signin;

import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.FragmentActivity;

import android.Manifest;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.signin.databinding.ActivityMapsBinding;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;



import java.util.HashMap;
import java.util.TreeMap;
import java.util.Vector;


public class MapsActivity2 extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    private ActivityMapsBinding binding;
    MarkerOptions marker;
    Vector<MarkerOptions> markerOptions;

    LatLng shahAlam;

    private String URL = "http://192.168.0.134/location/location.php";

    RequestQueue requestQueue;
    Gson gson;
    location[] locations;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityMapsBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        gson = new GsonBuilder().create();

        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        markerOptions = new Vector<>();
        markerOptions.add(new MarkerOptions().title("You are here")
                .position(new LatLng( 3.0697, 101.5037))
                .snippet("UiTM Shah Alam")
        );
        shahAlam = new LatLng(3.0671,101.5049);
        marker = new MarkerOptions().position(shahAlam).title("UiTM Shah Alam").snippet("You are here");


    }

    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        // Add a marker in Sydney and move the camera

        //mMap.addMarker(marker);

        for (MarkerOptions mark : markerOptions){
            mMap.addMarker(mark);
        }

        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(shahAlam,8));
        enableMyLocation();
        sendRequest();

    }

    private void enableMyLocation() {

        String perms[] = {"android.permission.ACCESS_FINE_LOCATION","android.permission.ACCESS_NETWORK_STATE"};
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                == PackageManager.PERMISSION_GRANTED) {
            if (mMap != null) {
                mMap.setMyLocationEnabled(true);
                Log.d("hafizxx","permission granted");
            }
        } else {
            // Permission to access the location is missing. Show rationale and request permission

            Log.d("hafizxx","permission denied");
            ActivityCompat.requestPermissions(this,perms ,200);

        }
    }

    public void sendRequest() {
        requestQueue = Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL,onSuccess,onError);
        requestQueue.add(stringRequest);
    }
    public Response.Listener<String> onSuccess = new Response.Listener<String>() {
        @Override
        public void onResponse(String response) {
            locations = gson.fromJson(response, location[].class);

            Log.d("Location", "List of Location :" + locations.length);

            if (locations.length <1){
                Toast.makeText(getApplicationContext(), "Problem retrieving JSON data",Toast.LENGTH_LONG).show();
                return;
            }

            for (location info: locations) {
                Double lat = Double.parseDouble(info.lat);
                Double lng = Double.parseDouble(info.lng);
                String title = info.name;
                String snippet = info.address;

                MarkerOptions marker = new MarkerOptions().position(new LatLng(lat,lng))
                        .title(title)
                        .snippet(snippet)
                        .icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_GREEN));

                mMap.addMarker(marker);
            }

        }
    };
    public Response.ErrorListener onError = new Response.ErrorListener() {
        @Override
        public void onErrorResponse(VolleyError error) {
            Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
        }
    };
}
