
$(document).ready(function() {
    //serve_images
    //
    $.ajax({
      url: "foursquare/serve_images.php",
      type:'json',
      context: document.body
    }).done(function(data) {
      console.log(data);
  //    var img = "<img alt=\"Jordan-crook\" src=\"http://s3.amazonaws.com/angelhack/people/33/gray_small/jordan-crook.jpg?1349186894\" />";
          var row = $('<div class="row"></div>');
          $("#gallery").append(row);
          var images = data.images;
          for(var i =0;i<images.length;i++){
              if(i%6==0){
                  row = $('<div class="row"></div>');
                  $("#gallery").append(row);
              }
              var img = '<img alt=\"Jordan-crook\" src="'+images[i].url+'" />';
              var b = $("<a href='"+images[i].url+"' />\n\
                              <div class=\"item judge person-lightbox\"> \n\
                                  <div class='hovered' style='display:block;'>"+img+"</div>\n\
                                  <div class='caption'>"+images[i].name+"</div>\n\
                              </div>\n\
                          </a>");
              row.append(b);
          }
      console.log(data);
    });
  
//   languages
    $.ajax({
    url: "github/serve_gh_lang.php",
    type:'json',
    context: document.body
    }).done(function(data) {
      console.log(data);
      if(data.langs.length==0)
          return;
       for(var i=0;i<data.langs.length;i++){
        var lang="<div class='date-box'>\n\
            <a href='http://ahsp13london.eventbrite.com'>\n\
            <div class='city-name'>"+data.langs[i].lang_name+"</div>\n\
            <div id='cursing_count' class='month'>\n\
                "+data.langs[i].count+"\n\
            </div>\n\
            <div class='date'>";
            var a = $(lang);
        $('#language_container').append(a);
       }
  });
  
  $.ajax({
    url: "github/serve_gh_record.php",
    type:'json',
    context: document.body
  }).done(function(data) {
    console.log(data);
    if(data.data.length==0)
        return;

    $('#rc_followers').html(data.data[0].n_followers);
    $('#rc_repos').html(data.data[0].n_repos);
    $('#rc_contributions').html(23);
  });
  
  
//   github record
  $.ajax({
    url: "facebook/serve_data.php",
    type:'json',
    context: document.body
  }).done(function(data) {
    console.log(data);
    if(data.data.length!=1)
        return;

    $('#cursing_count').html(data.data[0].swear_count+" occurrences");
    $('#rc_prejudgement').html(data.data[0].racism_count+" occurrences");
    $('#rc_misspeling').html(data.data[0].misspeling_count+" occurrences");
    $('#rc_misspeling').html(data.data[0].anger_count+" occurrences");
  });
  
  
  $.ajax({
    url: "stackoverflow/serve_user.php",
    type:'json',
    context: document.body
  }).done(function(data) {
    console.log(data);
    if(data.users.length==0)
        return;
    $('#rc_stackoverflow_username').html(data.users[0].display_name);
    $('#rc_reputation').html(data.users[0].reputation);
    $('#rc_gold').html(1);
    $('#rc_silver').html(31);
    $('#rc_bronze').html(323);
    $('#rc_answers').html(data.users[0].answer_count);
//    var img = "<img alt=\"Jordan-crook\" src=\"http://s3.amazonaws.com/angelhack/people/33/gray_small/jordan-crook.jpg?1349186894\" />";
//        var row = $('<div class="row"></div>');
//        $("#gallery").append(row);
//        var images = data.images;
//        for(var i =0;i<images.length;i++){
//            if(i%6==0){
//                row = $('<div class="row"></div>');
//                $("#gallery").append(row);
//            }
//            var img = '<img alt=\"Jordan-crook\" src="'+images[i].url+'" />';
//            var b = $("<a href='"+images[i].url+"' />\n\
//                            <div class=\"item judge person-lightbox\"> \n\
//                                <div class='hovered' style='display:block;'>"+img+"</div>\n\
//                                <div class='caption'>"+images[i].name+"</div>\n\
//                            </div>\n\
//                        </a>");
//            row.append(b);
//        }
    console.log(data);
  });
//  
  
});



//<a href="http://twitter.com/jordanrcrook " target="blank"><div class='item judge person-lightbox'>
//<div class='regular'>
//<img alt="Jordan-crook" src="http://s3.amazonaws.com/angelhack/people/33/gray_small/jordan-crook.jpg?1349186894" />
//</div>
//<div class='hovered' style='display:none;'>
//<img alt="Jordan-crook" src="http://s3.amazonaws.com/angelhack/people/33/small/jordan-crook.jpg?1349186894" />
//<div class='caption'>
//Jordan Crook
//</div>
//</div>
//</div>