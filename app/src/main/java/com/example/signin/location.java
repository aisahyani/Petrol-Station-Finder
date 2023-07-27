package com.example.signin;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class location {

    @SerializedName("id")
    @Expose
    public String id;
    @SerializedName("name")
    @Expose
    public String name;
    @SerializedName("address")
    @Expose
    public String address;
    @SerializedName("tel")
    @Expose
    public String tel;
    @SerializedName("district")
    @Expose
    public String district;
    @SerializedName("state")
    @Expose
    public String state;
    @SerializedName("postcode")
    @Expose
    public String postcode;
    @SerializedName("lat")
    @Expose
    public String lat;
    @SerializedName("lng")
    @Expose
    public String lng;
}

