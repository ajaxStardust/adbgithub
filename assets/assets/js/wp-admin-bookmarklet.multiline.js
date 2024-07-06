/** wpAdmin_v1 
* javascript:(()=>{javascript:(function(){var adminUrl = window.location.origin + '/wp-admin/';var thisPage = window.location.href;window.location.href = adminUrl + '?redirect_to=%27 + encodeURIComponent(thisPage);})();})();
*/

// THE PROTOTYPE
javascript:(
	()=>
	{
		javascript:
		(
			function(){
				var adminUrl = window.location.origin + '/wp-admin/';
				var thisPage = window.location.href;
				window.location.href = adminUrl + '?redirect_to=' + encodeURIComponent(thisPage);
			})
		();
	}
)
();


javascript:(()=>{javascript:(function(){var adminUrl = window.location.origin + '/wp-admin/';var thisPage = window.location.href;window.location.href = adminUrl + '?redirect_to=' + thisPage;})();})();