package com.prodigy.tradebook;

import com.parse.Parse;
import com.parse.ParseAnalytics;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
   
        Parse.initialize(this, "TxpQ3uAPZFAvfgCDk3eZEFPduzzQYYsxqHW86avD", 
				"9baXMlqJXVa1iUzghIE1Q3wkI4PDjMKhKMwtdj3l");
  
        
        this.startActivity(new Intent(this, Login.class));
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
