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

All assets are served locally from this repository; there are currently no external CDNs, trackers, or analytics integrated. Keep it that way unless explicitly requested — and if it changes, see the privacy policy section above.

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
- `kontakt.html`, `anfahrt.html` — contact and directions
- `impressum.html`, `datenschutz.html` — legal notice and privacy policy
- `mountainbike.html`, `mtb.html`, `wanderungen.html`, `ausflug.html`, `fastnacht.html`, `konus.html`, `umgebung.html`, `rundweg_prechtal.html` — activities and local information
- `gasthof_lieberatsberg.html`, `gast.html`, `fahrradverleih.html`, `beurteilung.html`, `link.html` — related information and partners

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

- Do **not** add Google Analytics, Tag Manager, Facebook Pixel, or similar trackers without an explicit request — they would require privacy-policy and (likely) consent-banner changes.
- Do **not** load fonts, scripts, or images from third-party CDNs without checking the privacy implications first.
- Do **not** commit secrets or personal data; this repository is public.
- Do **not** rename or remove `CNAME` unless the custom domain is intentionally changing.
