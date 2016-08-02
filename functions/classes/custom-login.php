<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Custom login related functions
 *
 * @package WordPress
 * @subpackage Tatton
 */

/**
 * Custom login handling
 *
 * @author Jonny Frodsham
 *
 **/

class CustomLogin
{
	/**
     * form error to return errors to the template
     * @var array
     */
    public $validation_errors = array();

	/**
	 *
	 */
	public function __construct()
	{
		add_action('custom_login', array($this, 'custom_login'));
		add_action('after_setup_theme', array($this, 'authenticate_user'));
	}


	public function custom_login()
	{
		if (count($this->validation_errors) > 0)
        {
            echo '<p>' . (array_key_exists('wp_error', $this->validation_errors) ? $this->validation_errors['wp_error'] : null) . '</p>';
        }

		echo '
			<form class="mt-sm" action="" method="post">
				<div class="form-group">
					<input type="hidden" name="key" value="'.Encryption::encryption('egg').'">
					<input type="hidden" name="action" value="'.Encryption::encryption('authenticate').'">
					<label for="user">Username:</label>
					<input class="form-control" name="user" type="text">
					<label for="password">Password:</label>
					<input class="form-control" name="password" type="password">
				</div>
				<button type="submit" class="btn btn-default btn--financial">Login</button>
			</form>
		';
	}

	public function authenticate_user()
	{
		if (isset($_POST['key']))
		{
			// programatically log in users
            $creds                  = array();
            $creds['user_login']    = esc_attr($_POST['user']);
            $creds['user_password'] = esc_attr($_POST['password']);
            $creds['remember']      = false;
            $user                   = wp_signon($creds, false);
            $user_id                = $user->ID;

            if (is_wp_error($user))
            {
            	// log the wordpress error
                $this->validation_errors['wp_error'] = 'ERROR: There is a problem with your credentials!';
            }
            else
            {
            	wp_set_current_user($user_id, $creds['user_login']);
            	wp_set_auth_cookie($user_id, true, false);
            }
		}
	}
}
