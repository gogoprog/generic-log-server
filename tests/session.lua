dofile("common.lua")

local session_id

local loglines = {
    "Foo",
    "Bar",
    "Hello!",
    "World?",
    "Test",
    "A small line",
    "Another line!"
    }

local version = math.random(1,1000)
local user = "dummyuser" .. math.random(1,100)

function LogRandomLine()
    TestQuery("log", { session_id=session_id, content=loglines[math.random(1,#loglines - 1)], level=math.random(0,5) }, { error = "none" })
end

session_id = Query("start", { name="dummy", version=version, user=user })[ "session_id" ]

for i = 1, 15 do
    LogRandomLine()
end

ShowTestResults()