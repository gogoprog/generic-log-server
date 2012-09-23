local Address = "http://localhost/log/"
local Url = Address .. "actions/"
local Command = "curl -s " .. Url

function Query(action, parameters)
    local command = Command .. action .. ".php"
    
    if parameters then
        command = command .. "?" .. parameters
    end
    
    print("Command: \"" .. command .. "\"")
    
    local stream = io.popen (command)

    for line in stream:lines() do
        print("Response: " .. line)
        return line;
    end
end

function TestQuery(action, parameters, expected)
    local response = Query(action, parameters)
    
    if response ~= expected then
        print("Expected: " .. expected)
        print("TEST FAILED ! <" .. action .. ">")
    else
        print("Test <" .. action .. "> passed.")
    end
    
    return response
end