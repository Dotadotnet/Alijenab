<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($names as $name)
          <sitemap><loc>{{ url("/sitemap/$name.xml") }}</loc></sitemap>
    @endforeach
</sitemapindex>