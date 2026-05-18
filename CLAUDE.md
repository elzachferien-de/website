# CLAUDE.md

This file provides guidance to Claude Code (and other AI assistants) when working on this repository.

## Important: Privacy Policy Check

On **every change** to this website, verify that the privacy policy (`datenschutz.html`) is still accurate and complete.

A review and likely update of the privacy policy is required when any of the following change:

- Integration of new third-party services, scripts, or fonts (e.g. Google Fonts, Google Maps, Analytics, tracking, social-media plugins)
- Adding or modifying forms (e.g. contact, booking, or sign-up forms)
- Use of cookies or local storage
- Embedding of third-party videos, maps, or iframes
- Changes to hosting, domain, or the CMS / framework components in use
- Any change in the processing of personal data

The legal notice (`impressum.html`) must also be reviewed for accuracy whenever contact details, ownership, or responsible parties change.

The site is operated from Germany and targets German visitors, so GDPR (DSGVO) and TMG/TTDSG obligations apply.

## Third-Party Embeds: 2-Click Consent Solution

All embedded third-party content that transmits personal data (IP address) on load **must use a 2-click consent placeholder**. The embed only loads after the user actively clicks a button. Legal basis: Art. 6(1)(a) DSGVO.

### Currently implemented

| Service | Pages | Consent basis |
|---|---|---|
| Google Maps | `kontakt.html`, `anfahrt.html` | Art. 6(1)(a) — active click required |
| komoot | `mountainbike.html`, `wanderungen.html`, `gasthof_lieberatsberg.html` | Art. 6(1)(a) — active click required |

### Adding a new third-party embed — checklist

1. **Never embed a raw `<iframe>` or `<script>` from a third party directly.** Always wrap it in a consent placeholder (see template below).
2. Add a new section to `datenschutz.html`: provider name, purpose, legal basis (lit. a), withdrawal notice, link to provider's privacy policy.
3. Mention the service in the **Cookies section** (§10) if it sets cookies.
4. Use the appropriate placeholder style — match the provider's brand colours so users recognise what they are activating.

### Placeholder template

```html
<div id="UNIQUE_ID" style="position:relative;width:WIDTHpx;max-width:100%;height:HEIGHTpx;
  background:#f0f0f0;border:1px solid #ccc;border-radius:4px;overflow:hidden;
  display:flex;align-items:center;justify-content:center;font-family:Arial,sans-serif;">
  <!-- Optional: SVG background suggesting the content type -->
  <div style="position:relative;z-index:1;text-align:center;background:rgba(255,255,255,0.92);
    padding:24px 32px;border-radius:6px;max-width:380px;box-shadow:0 2px 12px rgba(0,0,0,0.12);">
    <div style="font-size:18px;font-weight:700;color:#333;margin-bottom:8px;">PROVIDER NAME</div>
    <div style="font-size:13px;color:#777;margin-bottom:14px;">Inhalt noch nicht geladen</div>
    <p style="font-size:12px;color:#555;line-height:1.5;margin:0 0 16px;">
      Durch das Laden werden Daten (inkl. IP-Adresse) an PROVIDER übertragen.
      Mehr dazu in unserer <a href="datenschutz.html">Datenschutzerklärung</a>.
    </p>
    <button onclick="loadEmbed('UNIQUE_ID','EMBED_URL','WIDTH','HEIGHT')"
      style="background:#BRAND_COLOR;border:none;color:#fff;padding:10px 24px;
      font-size:14px;font-weight:600;border-radius:4px;cursor:pointer;">
      Inhalt laden
    </button>
  </div>
</div>
<script>
  function loadEmbed(wrapperId, src, w, h) {
    var wrapper = document.getElementById(wrapperId);
    var iframe = document.createElement('iframe');
    iframe.src = src; iframe.width = w; iframe.height = h;
    iframe.frameBorder = '0';
    wrapper.style.cssText = '';
    wrapper.innerHTML = '';
    wrapper.appendChild(iframe);
  }
</script>
```

Each page that uses embeds defines its own `loadKomoot` / `loadMap` function at the bottom — no shared script file, intentionally simple.


## Project Overview

`elzachferien.de` is a small, static marketing website for a vacation rental ("Ferienwohnung") in Elzach in the Black Forest, Germany. The site presents the apartment, the surrounding area, leisure activities, and contact information for prospective guests.

- **Live domain:** https://elzachferien.de (see `CNAME`)
- **Hosting:** GitHub Pages, served from the `main` branch
- **Generator:** Jekyll (the default GitHub Pages build pipeline)
- **Primary language of the site content:** German

The repository was migrated from a PHP-based router to a static Jekyll site; see `README.md` for the migration history.

## Tech Stack

- **Jekyll** static site generator (built automatically by GitHub Pages)
- **Bootstrap 3** for layout and responsive design
- **jQuery** plus a handful of small plugins (Modernizr, smoothscroll, easing, retina.js)
- **IcoMoon** icon font and custom web fonts (locally hosted)
- Plain HTML / CSS / JavaScript — no build step, no package manager

All fonts and first-party assets are served locally. Third-party services (Google Maps, komoot) are integrated but only activated by explicit user consent via the 2-click solution described above. Keep it that way unless explicitly requested — and if it changes, see the privacy policy section above.

## Repository Layout

```
├── _config.yml              # Jekyll configuration (site title, author, excludes)
├── _layouts/
│   └── default.html         # Shared layout: <head>, navbar, footer
├── *.html                   # Individual pages with Jekyll front matter
├── css/                     # Stylesheets (Bootstrap + custom)
├── js/                      # JavaScript libraries and small custom scripts
├── images/, img/            # Photography and graphics
├── fonts/, ico/             # Web fonts and favicons
├── CNAME                    # Custom domain for GitHub Pages
└── README.md                # Migration notes and local-dev instructions
```

### Key Pages

- `index.html` — landing page
- `fw2.html` — apartment details (rooms, availability, prices)
- `kontakt.html`, `anfahrt.html` — contact and directions (Google Maps, 2-click consent)
- `impressum.html`, `datenschutz.html` — legal notice and privacy policy
- `mountainbike.html`, `mtb.html`, `wanderungen.html`, `ausflug.html`, `fastnacht.html`, `konus.html`, `umgebung.html`, `rundweg_prechtal.html` — activities and local information
- `gasthof_lieberatsberg.html`, `gast.html`, `fahrradverleih.html`, `beurteilung.html`, `link.html` — related information and partners

Note: `mountainbike.html`, `wanderungen.html`, and `gasthof_lieberatsberg.html` contain komoot tour embeds (2-click consent).

## Conventions

- Every page begins with Jekyll front matter (`title`, `description`, `keywords`) which is consumed by `_layouts/default.html` for `<title>` and meta tags. Keep these populated when creating or editing pages.
- The navigation bar lives in `_layouts/default.html`. New top-level pages that should appear in the menu must be added there.
- The footer copyright year is rendered dynamically via Liquid (`{{ 'now' | date: '%Y' }}`) — do not hard-code the year.
- The site uses `lang="de"` and all visible content is in German. Keep user-facing copy in German unless the user asks otherwise.
- Prefer editing existing pages and shared layout fragments over duplicating markup.

## Local Development

Either of the following works for previewing changes locally:

```bash
# With Jekyll (matches GitHub Pages output)
bundle exec jekyll serve   # or: jekyll serve
# → http://localhost:4000

# Quick static preview (no Liquid processing)
python3 -m http.server 8000
# → http://localhost:8000
```

Note: the Python server serves the raw HTML files, so Liquid tags (e.g. the dynamic copyright year) will not be rendered. Use Jekyll when verifying anything that depends on front matter or layouts.

## Deployment

Deployment is automatic: pushing to `main` triggers a GitHub Pages build. There is no separate CI step or build artifact to publish manually.

## Things to Avoid

- Do **not** add Google Analytics, Tag Manager, Facebook Pixel, or similar trackers without an explicit request — they would require privacy-policy and consent-banner changes.
- Do **not** load fonts, scripts, or images from third-party CDNs without checking the privacy implications first. If you do add a third-party embed, use the 2-click consent solution described above.
- Do **not** commit secrets or personal data; this repository is public.
- Do **not** rename or remove `CNAME` unless the custom domain is intentionally changing.
