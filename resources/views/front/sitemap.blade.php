<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://kasko.az</loc>
        <priority>1.0</priority>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>https://kasko.az/en</loc>
        <priority>1.0</priority>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>https://kasko.az/ru</loc>
        <priority>1.0</priority>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    </url>
    @foreach($singles as $single)
        @if($single->type !== 'home')
            {{-- Exclude if type is home_page --}}
            @foreach($single->translations as $key => $translation)
                <url>
                    <loc>{{ url('/') . ($key > 0 ? '/' . $translation->locale : '') . '/' . $translation->slug }}</loc>
                    <priority>1.0</priority>
                    <lastmod>{{ $single->created_at->tz('UTC')->toAtomString() }}</lastmod>
                </url>
            @endforeach
        @endif
    @endforeach
    @foreach($services as $single)
        @foreach($single->translations as $key => $translation)
            <url>
                <loc>{{ url('/') . ($key>0 ? '/' . $translation->locale : '') . '/' . $translation->slug }}</loc>
                <priority>1.0</priority>
                <lastmod>{{ $single->created_at->tz('UTC')->toAtomString() }}</lastmod>
            </url>
        @endforeach
    @endforeach
    @foreach($blogs as $single)
        @foreach($single->translations as $key => $translation)
            <url>
                <loc>{{ url('/') . ($key>0 ? '/' . $translation->locale : '') . '/' . $translation->slug }}</loc>
                <priority>1.0</priority>
                <lastmod>{{ $single->created_at->tz('UTC')->toAtomString() }}</lastmod>
            </url>
        @endforeach
    @endforeach
    @foreach($links as $single)
        @foreach($single->translations as $key => $translation)
            <url>
                <loc>{{ url('/') . ($key>0 ? '/' . $translation->locale : '') . '/' . $translation->slug }}</loc>
                <priority>1.0</priority>
                <lastmod>{{ $single->created_at->tz('UTC')->toAtomString() }}</lastmod>
            </url>
        @endforeach
    @endforeach
    @foreach($contents as $single)
        @foreach($single->translations as $key => $translation)
            <url>
                <loc>{{ url('/') . ($key>0 ? '/' . $translation->locale : '') . '/' . $translation->slug }}</loc>
                <priority>1.0</priority>
                <lastmod>{{ $single->created_at->tz('UTC')->toAtomString() }}</lastmod>
            </url>
        @endforeach
    @endforeach
{{--        <url>--}}
{{--            <loc>{{ url('/sigorta_qanunu') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/dovlet_qulluqculari') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/icbari_sigorta_qanun') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/inzibati_xetalar_mecellesi') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/tibbi_sigorta_qanun') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/kasko_qanun') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
{{--        <url>--}}
{{--            <loc>{{ url('/sigorta_beledcisi') }}</loc>--}}
{{--            <priority>0.8</priority>--}}
{{--            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--        </url>--}}
</urlset>
