# Symfony Mailer Gmail Reproduction

This project show problem I got with mailer component.

The error I got is:
```
Expected response code "220" but got an empty response.
```
or
```
Expected response code "250" but got an empty response.
```

# Install
```
$ composer install
```

# Test
```
$ # Get your password using this guide: https://devanswers.co/create-application-specific-password-gmail/
$ # Edit EMAIL_FROM, EMAIL_TO and MAILER_DSN in .env
$ bin/console cache:clear
$ bin/console app:send-mail
```
