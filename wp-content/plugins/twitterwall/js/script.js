jQuery(document).ready(function($) {

    var refreshUrl;
    var gridSize = 120;

    var wall = new freewall("#tweet-container");
    wall.reset({
        selector: '.items',
        animate: false,
        cellW: gridSize,
        cellH: 'auto',
        fixSize: 0,
        gutterX: 20,
        gutterY: 10,
        onResize: function() {
            wall.fitWidth();
        }
    });
    wall.fitWidth();

    function loadNewTweets(refreshUrl, wall)
    {
        $.post( ajaxUrl, { url: refreshUrl }, function(data){

            refreshUrl = data.search_metadata.refresh_url;
            window.refreshUrl = refreshUrl;

            var tweets = data.statuses;
            var tweetCount = tweets.length;
            var j=0;
            (function delayedLoop (i) {

                if(typeof tweets[j].retweeted_status != "undefined")
                {
                    j++; if (--i) delayedLoop(i); //pass if retweeted
                }
                else
                {
                    setTimeout(function () {

                        var output = tweetToHtml(tweets[j]);
                        wall.prepend(output);

                        j++;
                        if (--i) delayedLoop(i);
                    }, 500)
                }
            })(tweets.length);


        }, "json");
    }

    function tweetToHtml(tweet)
    {
        //console.log(tweets[i]);
        var username = tweet.user.screen_name;
        var user = tweet.user;
        var status = tweet.text;
        var rt = '';
        var entities = tweet.entities;
        var retweet_count = tweet.retweet_count;

        if(retweet_count > 0)
        {
            rt = '<i class="fa fa-retweet"></i> '+ retweet_count;
        }

        // Linkify links
        status = status.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="'+url+'">'+url+'</a>';
        });

        // Linkify hashtags
        status = status.replace(/(^|[^&\w'"]+)\#([\S_^"^<]+)/g, function(m, m1, m2) {
            return m.substr(-1) === '"' || m.substr(-1) == '<' ? m : m1 + '<strong><a href="http://twitter.com/#!/search/%23' + m2 + '" class="hashtag">#' + m2 + '</a></strong>';
        });

        // Linkify @
        status = status.replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return  '<a href="http://twitter.com/#!/'+reply.substring(1)+'" class="mention">'+reply+'</a>';
        });


        /**
         * images media
         */
        var img = null;
        if(typeof(entities.media) != "undefined" && entities.media !== null)
            img = entities.media[0].media_url;


        /**
         * output html
         * @type {string}
         */
        var size = 2;
        var img_html =  '';
        if(img !== null)
        {
            size = 4;
            img_html = '<div class="text-center"><img class="img img-responsive" src="'+img+'"/></div>';

        }

        output =
            '<div class="items" style="width: '+gridSize*size+'px;">' +
            '<div class="panel panel-default">' +
            '<div class="panel-body">' +
            status +
            img_html +
            '</div>' +
            '<div class="panel-footer">' +
            '<div class="media">' +
            '<a class="media-left media-middle" href="#">' +
            '<img src="'+ user.profile_image_url +'" width="48">' +
            '</a>' +
            '<div class="media-body">' +
            '<h4 class="media-heading">' +
            user.name +
            '</h4>' +
            rt +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div> ';

        return output;
    }


    loadNewTweets(refreshUrl, wall);

    setInterval(function(){
        console.log(window.refreshUrl);
        loadNewTweets(window.refreshUrl, wall);
    }, 50000);

});