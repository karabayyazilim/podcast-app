<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0" xmlns:atom="http://www.w3.org/2005/Atom"
     version="2.0">
    <channel>
        <title>{{config('setting.rss_title')}}</title>
        <link>{{config('setting.rss_title')}}</link>
        <description>
            <![CDATA[ {{config('setting.rss_title')}} ]]>
        </description>
        <atom:link href="{{config('app.url')}}" rel="self" type="application/rss+xml"/>
        <language>tr</language>
        <category>Self-Improvement</category>
        <copyright>Copyright ALİ KARABAY</copyright>
        <image>
            <url>
                https://podcast.karabayyazilim.com/storage/{{config('setting.rss_image')}}
            </url>
            <title>{{config('setting.rss_title')}}</title>
            <link>{{config('setting.rss_title')}}</link>
        </image>
        <lastBuildDate>{{ $feeds->last()->created_at->toAtomString() }}</lastBuildDate>
        <itunes:author>ALİ KARABAY</itunes:author>
        <itunes:owner>
            <itunes:name>ALİ KARABAY</itunes:name>
            <itunes:email>alikarabay77@gmail.com</itunes:email>
        </itunes:owner>
        <itunes:image
            href="https://podcast.karabayyazilim.com/storage/{{config('setting.rss_image')}}"/>
        <itunes:subtitle>{{config('setting.rss_description')}}
        </itunes:subtitle>
        <itunes:summary>
            <![CDATA[ {{config('setting.rss_description')}} ]]>
        </itunes:summary>
        <itunes:category text="Education">
            <itunes:category text="Self-Improvement"/>
        </itunes:category>
        <itunes:explicit>clean</itunes:explicit>
        <itunes:type>episodic</itunes:type>
        <googleplay:author>ALİ KARABAY</googleplay:author>
        <googleplay:image
            href="https://podcast.karabayyazilim.com/storage/{{config('setting.rss_image')}}"/>
        <googleplay:email>alikarabay@gmail.com</googleplay:email>
        <googleplay:description>{{config('setting.rss_description')}}
        </googleplay:description>
        <googleplay:category text="Education"/>
        <googleplay:explicit>No</googleplay:explicit>
        @foreach($feeds as $feed)
            <item>
                <title>{{$feed->title}}</title>
                <link>
                    {{route('feed.detail',$feed->id)}}</link>
                <guid isPermaLink="false">{{route('feed.detail',$feed->id)}}</guid>
                <pubDate>{{ $feed->created_at->toAtomString() }}</pubDate>
                <enclosure
                    url="{{str_contains($feed->src_url, 'https://') ? $feed->src_url : config('app.url').'/storage/'. $feed->src_url}}"
                    length="8997738" type="audio/mpeg"/>
                <itunes:author>ALİ KARABAY</itunes:author>
                <itunes:duration>560</itunes:duration>
                <itunes:explicit>clean</itunes:explicit>
                <itunes:image
                    href="https://podcast.karabayyazilim.com/storage/{{$feed->image}}"/>
                <itunes:episodeType>full</itunes:episodeType>
                <googleplay:author>ALİ KARABAY</googleplay:author>
                <googleplay:image
                    href="https://podcast.karabayyazilim.com/storage/{{$feed->image}}"/>
                <googleplay:explicit>No</googleplay:explicit>
            </item>
        @endforeach
    </channel>
</rss>
