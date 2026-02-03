# Elzachferien.de - Jekyll Static Site

This site has been converted from PHP to Jekyll for hosting on GitHub Pages.

## What Changed

- **Before**: PHP router (`index.php`) that merged `templates/layout.html` with content files
- **After**: Static Jekyll site with `_layouts/default.html` and individual HTML pages

## File Structure

```
├── _config.yml              # Jekyll configuration
├── _layouts/
│   └── default.html         # Main layout template
├── css/                     # Stylesheets (unchanged)
├── js/                      # JavaScript (unchanged)
├── images/                  # Images (unchanged)
├── fonts/                   # Fonts (unchanged)
├── *.html                   # 19 Jekyll pages with front matter
└── templates/               # Old PHP templates (can be deleted after testing)
```

## Testing Locally

### Option 1: Using Jekyll (Recommended)

Install Jekyll and test the site locally:

```bash
# Install Jekyll (if not already installed)
gem install jekyll bundler

# Serve the site locally
jekyll serve

# Visit http://localhost:4000 in your browser
```

### Option 2: Using Python SimpleHTTPServer

For a quick test without Jekyll:

```bash
python3 -m http.server 8000

# Visit http://localhost:8000 in your browser
```

## Deploying to GitHub Pages

1. **Create a GitHub repository** for your site (if you haven't already)

2. **Initialize git and push** (if not already a git repo):
   ```bash
   git init
   git add .
   git commit -m "Convert to Jekyll for GitHub Pages"
   git branch -M main
   git remote add origin https://github.com/YOUR_USERNAME/elzachferien.de.git
   git push -u origin main
   ```

3. **Enable GitHub Pages**:
   - Go to your repository on GitHub
   - Click "Settings" → "Pages"
   - Under "Source", select "Deploy from a branch"
   - Select branch: `main` and folder: `/ (root)`
   - Click "Save"

4. **Wait for deployment**:
   - GitHub will automatically build your Jekyll site
   - Your site will be available at: `https://YOUR_USERNAME.github.io/elzachferien.de/`
   - Or use a custom domain if you configure it

## Making Changes

### To edit the layout (header, footer, navigation):
Edit `_layouts/default.html`

### To edit page content:
Edit the respective `.html` file in the root directory (e.g., `index.html`, `fw2.html`, etc.)

### To change site-wide settings:
Edit `_config.yml`

### After making changes:
```bash
git add .
git commit -m "Your change description"
git push
```

GitHub Pages will automatically rebuild and deploy your site within 1-2 minutes.

## Custom Domain (Optional)

To use `elzachferien.de` instead of the GitHub Pages URL:

1. Create a file named `CNAME` in the root directory:
   ```bash
   echo "elzachferien.de" > CNAME
   ```

2. Configure your domain DNS:
   - Add an A record pointing to GitHub Pages IPs:
     - 185.199.108.153
     - 185.199.109.153
     - 185.199.110.153
     - 185.199.111.153
   - Or add a CNAME record pointing to `YOUR_USERNAME.github.io`

3. In GitHub Settings → Pages, enter your custom domain and save

## Updating Copyright Year

The copyright year in the footer automatically updates to the current year using Jekyll's Liquid syntax:
```liquid
©2011-{{ 'now' | date: '%Y' }}
```

No manual updates needed!

## Cleanup (After Testing)

Once you've confirmed everything works, you can safely delete:
- `index.php`
- `templates/` directory
- `convert_to_jekyll.py`
- `convert_to_jekyll.sh`

These files are already excluded from Git via `.gitignore`.
