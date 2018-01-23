function hugeitMapsJSONFileGenerator(JSONData, ReportTitle, ShowLabel) {
    /*If JSONData is not an object then JSON.parse will parse the JSON string in an Object*/
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    var json = JSON.stringify(JSONData);

    var fileName = "";
    fileName += ReportTitle.replace(/ /g,"_");
    var uri = 'data:text/json;charset=utf-8,' + escape(json);
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".json";
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

jQuery(document).ready(function(){
    jQuery(".extract_to_json_button").on("click",function(){
        var map_id=jQuery(this).data("map-id"),
            data = {
                action:"hugeit_maps_export_to_json",
                nonce: extractJSONL10n.nonce,
                map_id:map_id
            };

        jQuery.post(ajaxurl,data,function(response){
            if(response.success){
                var name="";
                if(response.map_name!=""){
                    name = response.map_name;
                }else{
                    name = map_id
                }
                hugeitMapsJSONFileGenerator(response.string, "Map Info_"+name, false);
            }

        },'json');
    });
});