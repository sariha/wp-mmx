function TwigetTwitter(e,t,r,i){var a=[],s=e[0].user.description,n=e.length,g=1;i.offset&&(g=i.offset),g-=1,i.count&&(n=i.count+g),n>e.length&&(n=e.length);for(var l=g;n>l;l++){var p=e[l].user.screen_name,c=e[l].text;c=c.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g,function(e){return'<a href="'+e+'">'+e+"</a>"}),c=c.replace(/\B@([_a-z0-9]+)/gi,function(e){return'<a href="http://twitter.com/#!/'+e.substring(1)+'">'+e+"</a>"}),c=c.replace(/(^|[^&\w'"]+)\#([a-zA-Z0-9_^"^<]+)/g,function(e,t,r){return'"'===e.substr(-1)||"<"==e.substr(-1)?e:t+'<strong><a href="http://twitter.com/#!/search/%23'+r+'">#'+r+"</a></strong>"});var o='<li>		<p class="twiget-tweet">%profileimg%%text%</p>		<p class="twiget-meta">		<span class="timestamp"><a href="http://twitter.com/%screen_name%/statuses/%tweet_id%">%relative_time%</a></span>		%client%		</p>		</li>';if(i.template&&(o=i.template),c=o.replace("%text%",c),c=c.replace("%screen_name%",p),c=c.replace("%tweet_id%",e[l].id_str),c=c.replace("%relative_time%",TwigetRelativeTime(e[l].created_at)),c=i.twitterclient?c.replace("%client%",'<span class="client">'+TwigetArgs.via.replace("twigetTweetClient",e[l].source)+"</span>"):c.replace("%client%",""),TwigetArgs.isSSL)var w=e[l].user.profile_image_url_https;else var w=e[l].user.profile_image_url;c=i.profilepic?c.replace("%profileimg%",'<img src="'+w+'" alt="'+e[l].user.screen_name+'" width="48" height="48" />'):c.replace("%profileimg%",""),i.newwindow&&(c=c.replace(/<a href=/gi,'<a target="_blank" href=')),a.push(c)}document.getElementById(t).innerHTML=a.join(""),i.showbio&&(document.getElementById(r).innerHTML=""+s)}function TwigetRelativeTime(e){var t=e.split(" ");e=t[1]+" "+t[2]+", "+t[5]+" "+t[3];var r=Date.parse(e),i=arguments.length>1?arguments[1]:new Date,a=parseInt((i.getTime()-r)/1e3);return a+=60*i.getTimezoneOffset(),60>a?TwigetArgs.LessThanMin:120>a?TwigetArgs.AboutAMin:3600>a?TwigetArgs.MinutesAgo.replace("twigetRelTime",parseInt(a/60).toString()):7200>a?TwigetArgs.AnHourAgo:86400>a?TwigetArgs.HoursAgo.replace("twigetRelTime",parseInt(a/3600).toString()):172800>a?TwigetArgs.OneDayAgo:TwigetArgs.DaysAgo.replace("twigetRelTime",parseInt(a/86400).toString())}