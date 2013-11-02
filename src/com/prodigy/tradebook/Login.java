package com.prodigy.tradebook;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.parse.LogInCallback;
import com.parse.ParseException;
import com.parse.ParseUser;
import com.parse.SignUpCallback;

public class Login extends Activity {

	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
	    super.onCreate(savedInstanceState);
	    
        setContentView(R.layout.activity_login);
        
        this.setupLoginButton();
        this.setupSignUpButton();
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
				
				Login.this.checkEmptyUserOrPassword(str_username, str_password);

				ParseUser.logInInBackground(str_username, str_password, new LogInCallback() {
					
					@Override
					public void done(ParseUser user, ParseException e) {
						
						if(user != null) {
							//Successful login
							
							// Probably start new activity, passing in the Parse user as an extra
						}
						else {
							//Invalid login creditials
							Toast invalid_creds = Toast.makeText(Login.this, "The username and password given are invalid", Toast.LENGTH_LONG);
							invalid_creds.show();
						}
					}
					
				});
			}
		});
	}
	
	private void setupSignUpButton() {
		Button b_login = (Button) findViewById(R.id.b_signup);
		
		b_login.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				EditText et_username = (EditText) findViewById(R.id.et_username);
				EditText et_password = (EditText) findViewById(R.id.et_password);
				String str_username  = et_username.getText().toString();
				String str_password  = et_password.getText().toString();
				
				Login.this.checkEmptyUserOrPassword(str_username, str_password);

				ParseUser new_user = new ParseUser();
				new_user.setUsername(str_username);
				new_user.setPassword(str_password);
				
				new_user.signUpInBackground(new SignUpCallback() {
					  public void done(ParseException e) {
					    if (e == null) {
					      // Successful. 
					    	Toast no_username = Toast.makeText(Login.this, "Sign up successful", Toast.LENGTH_SHORT);
							no_username.show();
					    } else {
					      // Failed....
					    	Toast no_username = Toast.makeText(Login.this, "Sign up NOT successful", Toast.LENGTH_SHORT);
							no_username.show();
					    }
					  }
					});
			}
		});
	}
	
	
	private void checkEmptyUserOrPassword(String username, String password) {
		//No username was provided. Display error message
		if(username == null || username.equals("")) {
			Toast no_username = Toast.makeText(this, "Please enter a username.", Toast.LENGTH_SHORT);
			no_username.show();
		}
		
		//No username was provided. Display error message
		if(password == null || password.equals("")) {
			Toast no_password = Toast.makeText(this, "Please enter a password.", Toast.LENGTH_SHORT);
			no_password.show();
		}
		
	}

}
