# laravel-cms
Basic CMS Feature for Laravel.

## CMS Entries

Entries are localized, and identified by a key.
In essence, an entry is a simple object:
- `string $key` - max 255 bytes (VARCHAR column).
- `string $content` - max 65 536 bytes (TEXT column).

The keyword here is **byte**.
- A pure English text will contain single-byte chars,
  so you can store on average [12k words](https://charactercounter.com/characters-to-words)
  worth of text, which is more than enough.
- A French text contains single-byte and two-bytes chars,
  so you won't handle as much chars.
- Languages with no relation to latin alphabet will use
  between 2 and 4 bytes per char, which greatly limits
  the maximum length (divided by 2 to 4).

Because we store html content (produced by the text editor),
the maximum length depends on:
- the language used.
- the amount of html tags.

If you ever feel like your content will reach the hard 64KB limit,
then you should split it in several CMS entries. Dot notation is
appropriate in this situation. For example, `cgv` becomes:
- `cgv.preambule`
- `cgv.credit-card`
- `cgv.paypal`
- `cgv.shipping`
- ...

## Local dev setup

1. Create a Laravel project (you can use our
   [skeleton](https://github.com/agence-webup/laravel-skeleton)).
2. In this project, create a `webup` folder.
3. `cd ./webup`
4. `git clone git@github.com:agence-webup/laravel-cms.git`
5. `cd` to your project root
6. Inside `composer.json`:
    ```json
    {
        // ...
        "repositories": [{
            "type": "path",
            "url": "./webup/laravel-cms"
        }]
    }
    ```

7. (if webup team) `pliz bash app`
8. `composer require webup/laravel-cms`

## Notes

### Components and directives

We are going to use components:
```html
<x-cms::content key="cgv.preambule">
    Default cgv.
</x-cms:content>
```

### I18N

We will use `App::currentLocale();` to figure out the current locale.
For example, having the following entry keys:
- `cgv.preambule`
- `about.team`

The current locale will be appended to the keys:
- `cgv.preambule.en` or `cgv.preambule.fr`, etc...
- `about.team.en` or `about.team.fr`, etc...
