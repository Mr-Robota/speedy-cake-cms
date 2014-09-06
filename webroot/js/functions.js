function isValidEmail(email) {
if (email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) != -1)
return true;
else
return false;
}

function isValidUsername(username) {
	
	var expression = /^[a-z0-9._-]{3,16}$/;
	if (!expression.test(username)) return(false);
	else return(true);
	
}

function isValidPassword(pwd) {
	
	var expression = /^[a-z0-9._-]{6,18}$/;
	if (!expression.test(pwd)) return(false);
	else return(true);
	
}

function isValidUrl(url) {
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    if (RegExp.test(url)){
        return true;
    } else {
        return false;
    }
}

function isValidImage(file) {
	if (!file.match(/\.(jpg|jpeg|png|gif)$/)) return(false);
	else return(true);
}

function isValidFile(file) {
	if (!file.match(/\.(jpg|jpeg|png|gif|zip|pdf|doc|docx|txt)$/)) return(false);
	else return(true);
} 

function isValidFileBackup(file) {
	if (!file.match(/\.(txt|sql)$/)) return(false);
	else return(true);
} 

function isValidIpAddress(ip) {
	
	var expression = /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
	if (!expression.test(ip)) return(false);
	else return(true);
	
}

function isValidDate(d) {
	
    var re = /^(\d{4})\-(\d{2})\-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/;
    return re.test(d);
	
}

function deleteRow(controller,id) {
	$('#idRow').val(id);
	$('#controllerRow').val(controller);
	$('#deleteRowModal').modal('show');	
}

function goDeleteRow(url) {
	window.location.href=url + "/admin/" + $('#controllerRow').val() + "/delete/" + $('#idRow').val();
}

function openFilemanager() {
	$('#fileManager').modal('show');	
}

function closeFilemanager() {
	$('#fileManager').modal('hide');	
}

function openUpload() {
	$('#fileManager').modal('hide');	
	$('#uploadFile').modal('show');	
}

function closeUpload() {	
	$('#uploadFile').modal('hide');	
}

function openImagegallery() {
	$('#fileManager').modal('hide');	
	$('#imageGallery').modal('show');	
}

function closeImagegallery() {	
	$('#imageGallery').modal('hide');	
}