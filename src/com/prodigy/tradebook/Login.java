package com.prodigy.tradebook;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Login extends Activity {

	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	    
        setContentView(R.layout.activity_login);
        
        this.setupLoginButton();
	}
	
	private void setupLoginButton() {
		Button b_login = (Button) findViewById(R.id.b_login);
		
		b_login.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				EditText et_username = (EditText) findViewById(R.id.et_username);
				EditText et_password = (EditText) findViewById(R.id.et_password);
				String str_username  = et_username.getText().toString();
				String str_password  = et_password.getText().toString();
				
				
				//No username was provided. Display error message
				if(str_username == null || str_username.equals("")) {
					Toast no_username = Toast.makeText(Login.this, "Please enter a username.", Toast.LENGTH_SHORT);
					no_username.show();
				}
				
				//No username was provided. Display error message
				if(str_password == null || str_password.equals("")) {
					Toast no_password = Toast.makeText(Login.this, "Please enter a password.", Toast.LENGTH_SHORT);
					no_password.show();
				}
				
				
			}
		});
	}

}
