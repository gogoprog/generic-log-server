local Address = "http://localhost/log/"
local Url = Address .. "actions/"
local CommandPrefix = "curl -s "

local TestCount = 0
local TestSucceededCount = 0

local JSON = (loadfile "JSON.lua")()

function Query(action, parameters)
    local command = CommandPrefix .. "\"" .. Url .. action .. ".php\""
    
    if parameters then
        command = command .. " -G -d json=\"" .. string.gsub(JSON:encode(parameters), '"', "\\\"") .. "\""
    end

    print("Command: " .. command )
    
    local stream = io.popen (command)

    for line in stream:lines() do
        print("Response: " .. line)
        return JSON:decode(line);
    end
end

function TestQuery(action, parameters, expected)
    local succeeded, response = pcall(Query, action, parameters)
    local expected_differs = false
    
    TestCount = TestCount + 1

    if succeeded then
        for k,v in ipairs(response) do
            if expected[k] ~= v then
                expected_differs = true
                break
            end
        end
        
        if expected_differs then
            print("Expected: " .. expected)
            print("TEST FAILED ! <" .. action .. ">")
        else
            print("Test <" .. action .. "> passed.")
            
            TestSucceededCount = TestSucceededCount + 1
        end

        return response
    end

end


function ShowTestResults()
    print("\nTests succeeded : " .. TestSucceededCount .. " / " .. TestCount)
end