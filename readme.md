<p align="center"><a href="https://eyewitness.io" target="_blank"><img width="200"src="https://eyewitness.io/img/logo/package.png"></a></p>

## Eyewitness.io package for Laravel 5 applications

<a href="https://eyewitness.io">Eyewitness.io</a> is a monitoring and application analytic solution focused specifically for Laravel. Know how your applications are *actually* performing. Monitor uptime, queues, cron schedules, email, logs, security, SSL, DNS and much more. Super simple installation - be up and running in just 90 seconds...

### Installation

**Composer**

**1)** Add the package to "require" in composer.json

    composer require eyewitness/eye

**2)** Once composer is finished, you need to add the service provider. Open `config/app.php`, and add a new item to the providers array.

    Eyewitness\Eye\EyeServiceProvider::class,

**3)** Now run the package installer.

    php artisan eyewitness:install

At the end you will be <i>optionally</i> asked for your email, so you we can email you a link to login with your `app_token` and `secret_key` (the email will be sent by our server, so it is ok if you do not have email configured on your local server).

Alternatively you can just copy and paste the `app_token` and `secret_key` yourself into the Eyewitness.io website.

**4)** Now log into <a href="https://eyewitness.io">https://eyewitness.io</a> to view your server. If you dont already have an account, you can create a free trial. Once you login, simply use your `app_token` and `secret_key` to associate this application to your account.

### Setup

Running `php artisan eyewitness:install` will actually setup almost everything for you. It will automatically start monitoring your default queue, know what cron jobs need to run, start emailing testing etc.

In the `config/eyewitness.php` file there are a number of options to disable certain checks (for example, if you dont use email or queues in your application).

The only config option some people need to change is `queue_tube_list`. If you run multiple queue tubes (using `--tube`) - then you should add the other queue tubes you want monitored here.

### Version

This package supports all versions of Laravel 5.

If you are running Laravel 4.2 - you should use [the Eyewitness Laravel 4.2 package](https://github.com/eyewitness/eye4)

If you are running Lumen please get in contact with us `support@eyewitness.io` and we'll organise to get you beta access to the package currently under development.

### Documentation & Support

Please visit our help center and documentation page if you need more assistance: [http://docs.eyewitness.io](http://docs.eyewitness.io)

### Security Vulnerabilites

If you discover a security vulnerability within this pacakge, please email security@eyewitness.io instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

### License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
