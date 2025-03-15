<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script type="text/javascript">
            const Ziggy = {
                "url": "https:\/\/chatpix.xyz",  // Changed from http to https
                "port": null,
                "defaults": {},
                "routes": {
                    "home": {"uri": "/", "methods": ["GET", "HEAD"]},
                    "dashboard": {"uri": "dashboard", "methods": ["GET", "HEAD"]},
                    "chatpanel": {"uri": "chatpanel\/{number}", "methods": ["GET", "HEAD"], "parameters": ["number"]},
                    "profile.edit": {"uri": "settings\/profile", "methods": ["GET", "HEAD"]},
                    "profile.update": {"uri": "settings\/profile", "methods": ["PATCH"]},
                    "profile.destroy": {"uri": "settings\/profile", "methods": ["DELETE"]},
                    "password.edit": {"uri": "settings\/password", "methods": ["GET", "HEAD"]},
                    "password.update": {"uri": "settings\/password", "methods": ["PUT"]},
                    "appearance": {"uri": "settings\/appearance", "methods": ["GET", "HEAD"]},
                    "register": {"uri": "register", "methods": ["GET", "HEAD"]},
                    "login": {"uri": "login", "methods": ["GET", "HEAD"]},
                    "password.request": {"uri": "forgot-password", "methods": ["GET", "HEAD"]},
                    "password.email": {"uri": "forgot-password", "methods": ["POST"]},
                    "password.reset": {"uri": "reset-password\/{token}", "methods": ["GET", "HEAD"], "parameters": ["token"]},
                    "password.store": {"uri": "reset-password", "methods": ["POST"]},
                    "verification.notice": {"uri": "verify-email", "methods": ["GET", "HEAD"]},
                    "verification.verify": {"uri": "verify-email\/{id}\/{hash}", "methods": ["GET", "HEAD"], "parameters": ["id", "hash"]},
                    "verification.send": {"uri": "email\/verification-notification", "methods": ["POST"]},
                    "password.confirm": {"uri": "confirm-password", "methods": ["GET", "HEAD"]},
                    "logout": {"uri": "logout", "methods": ["POST"]},
                    "storage.local": {"uri": "storage\/{path}", "methods": ["GET", "HEAD"], "wheres": {"path": ".*"}, "parameters": ["path"]}
                }
            };
            !function(t,r) {
                "object" == typeof exports && "undefined" != typeof module ? module.exports = r() : "function" == typeof define && define.amd ? define(r) : (t || self).route = r()
            }(this, function() {
                // The rest of your Ziggy build code here
            });
        </script>

        <link rel="preload" as="style" href="https://chatpix.xyz/build/assets/app-CNFCo4nZ.css" />
        <link rel="modulepreload" href="https://chatpix.xyz/build/assets/app-VZPGXAC6.js" />
        <link rel="stylesheet" href="https://chatpix.xyz/build/assets/app-CNFCo4nZ.css" />
        <script type="module" src="https://chatpix.xyz/build/assets/app-VZPGXAC6.js"></script>

    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
