dofile("common.lua")


local session_id

session_id = Query("start", { name="dummy", version="166", user="dummyuser" })[ "session_id" ]

TestQuery("log", { session_id=session_id, content="dummylog", level=0 }, { error = "none" })
TestQuery("log", { session_id=session_id, content="dummylog", level=0 }, { error = "none" })
TestQuery("log", { session_id=session_id, content="dummylog", level=0 }, { error = "none" })

ShowTestResults()