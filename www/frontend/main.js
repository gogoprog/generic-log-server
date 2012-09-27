var actionPath = "../actions/";

var loglevelcolors = [
    "black",
    "black",
    "black",
    "black",
    "blue",
    "red"
    ];

function request(actionName, func, parameters)
{
    var url;
    
    url = actionPath + actionName + ".php";
    
    if(parameters)
    {
        url += "?json=" + JSON.stringify(parameters);
    }

    $.get(url,func);
}

function fillSelectWithApplications(element)
{
    request("getapplications",function(data) {
        var content = "";
        var apps = eval( '(' + data + ')');

        content += "<option>Select application...</option>";
        for (var i=0; i<apps.length; ++i)
        {
            var app = apps[i];
            content += "<option value=\"" + app["id"] + "\">" + app["name"] + " (" + app["version"] + ")</option>";

        }

        element.html(content);
    });
}

function fillSelectWithSessions(element,app_id)
{
    var params;

    params = {"app_id":app_id};
    
    request("getsessions",function(data) {
        var content = "";
        var sessions = eval( '(' + data + ')');

        for (var i=0; i<sessions.length; ++i)
        {
            var session = sessions[i];
            content += "<option value=\"" + session["id"] + "\">" + session["start_date"] + " | " + session["user"] + "</option>";
        }

        element.html(content);
    }, params);
}

function fillDivWithLogs(element,session_id)
{
    var params;
    
    element.html("Loading...");
    
    params = {"session_id":session_id};
    
    request("getlogs",function(data) {
        var content = "";
        var logs = eval( '(' + data + ')');

        for (var i=0; i<logs.length; ++i)
        {
            var log = logs[i];
            content += "<span style=\"color:" + loglevelcolors[log["level"]] + ";\">" + log["content"] + "</span>";
        }

        element.html(content);
    }, params);
}


function onSelectApplication(element)
{
    fillSelectWithSessions($("#select_sessions"), element.value);
}

function onSelectSession(element)
{
    fillDivWithLogs($("#div_logs"), element.value);
}

$(document).ready(function() {
    fillSelectWithApplications($("#select_apps"));
});