<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
     xmlns:googleplay="http://www.google.com/schemas/play-podcasts/1.0" xmlns:atom="http://www.w3.org/2005/Atom"
     version="2.0">
        <channel>
            <title>{{$feed->title}}</title>
            <link>{{route('feed.detail',$feed->id)}}</link>
            <description>
                <![CDATA[ {{$feed->description}} ]]>
            </description>
            <atom:link href="{{route('feed.detail',$feed->id)}}" rel="self"
                       type="application/rss+xml"/>
            <language>tr</language>
            <category>Self-Improvement</category>
            <copyright>Copyright ALİ KARABAY</copyright>
            <image>
                <url>
                    https://podcast.karabayyazilim.com/storage/{{$feed->image}}
                </url>
                <title>{{$feed->title}}</title>
                <link>{{route('feed.detail',$feed->id)}}</link>
            </image>
            <lastBuildDate>{{ $feed->created_at->toAtomString() }}</lastBuildDate>
            <itunes:author>ALİ KARABAY</itunes:author>
            <itunes:owner>
                <itunes:name>ALİ KARABAY</itunes:name>
                <itunes:email>alikarabay77@gmail.com</itunes:email>
            </itunes:owner>
            <itunes:image
                href="https://podcast.karabayyazilim.com/storage/{{$feed->image}}"/>
            <itunes:subtitle>{{$feed->description}}
            </itunes:subtitle>
            <itunes:summary>
                <![CDATA[ {{$feed->description}} ]]>
            </itunes:summary>
            <itunes:category text="Education">
                <itunes:category text="Self-Improvement"/>
            </itunes:category>
            <itunes:explicit>clean</itunes:explicit>
            <itunes:type>episodic</itunes:type>
            <googleplay:author>ALİ KARABAY</googleplay:author>
            <googleplay:image
                href="https://podcast.karabayyazilim.com/storage/{{$feed->image}}"/>
            <googleplay:email>alikarabay@gmail.com</googleplay:email>
            <googleplay:description>{{$feed->description}}
            </googleplay:description>
            <googleplay:category text="Education"/>
            <googleplay:explicit>No</googleplay:explicit>
            <item>
                <title>{{$feed->title}}</title>
                <link>
                    {{route('feed.detail',$feed->id)}}</link>
                <guid isPermaLink="false">{{route('feed.detail',$feed->id)}}</guid>
                <pubDate>{{ $feed->created_at->toAtomString() }}</pubDate>
                <enclosure
                    url="https://podcast.karabayyazilim.com/storage/{{$feed->src_url}}"
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
        </channel>
</rss>
