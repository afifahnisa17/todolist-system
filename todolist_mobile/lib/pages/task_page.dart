import 'package:flutter/material.dart';
import 'login_page.dart';

class TaskPage extends StatefulWidget {
  const TaskPage({super.key});

  @override
  State<TaskPage> createState() => _TaskPageState();
}

class _TaskPageState extends State<TaskPage> {

  List tasks = [
    {"title": "Belajar Flutter", "done": false},
    {"title": "Bikin API Laravel", "done": true},
    {"title": "Connect Flutter API", "done": false},
  ];

  void _addTask(String title) {
    setState(() {
      tasks.add({"title": title, "done": false});
    });
  }

  void _showAddTask() {
    final controller = TextEditingController();

    showModalBottomSheet(
      context: context,
      isScrollControlled: true,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(20)),
      ),
      builder: (context) {
        return Padding(
          padding: EdgeInsets.only(
            bottom: MediaQuery.of(context).viewInsets.bottom,
            top: 20,
            left: 20,
            right: 20,
          ),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [

              const Text(
                "Add Task",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),

              const SizedBox(height: 10),

              TextField(
                controller: controller,
                decoration: const InputDecoration(
                  labelText: "Task name",
                  border: OutlineInputBorder(),
                ),
              ),

              const SizedBox(height: 15),

              SizedBox(
                width: double.infinity,
                child: ElevatedButton(
                  onPressed: () {
                    if (controller.text.isNotEmpty) {
                      _addTask(controller.text);
                      Navigator.pop(context);
                    }
                  },
                  child: const Text("Add"),
                ),
              ),

              const SizedBox(height: 20),
            ],
          ),
        );
      },
    );
  }

  void _toggleTask(int index) {
    setState(() {
      tasks[index]["done"] = !tasks[index]["done"];
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF6F7FB),

      // APPBAR
      appBar: AppBar(
        title: const Text("Dashboard"),
        actions: [

          // LOGOUT
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: () {
              Navigator.pushReplacement(
                context,
                MaterialPageRoute(
                  builder: (context) => const LoginPage(),
                ),
              );
            },
          )
        ],
      ),

      // FLOAT BUTTON
      floatingActionButton: FloatingActionButton(
        onPressed: _showAddTask,
        child: const Icon(Icons.add),
      ),

      // BODY
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [

            const Text(
              "My Tasks",
              style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),

            const SizedBox(height: 15),

            Expanded(
              child: ListView.builder(
                itemCount: tasks.length,
                itemBuilder: (context, index) {

                  final task = tasks[index];

                  return Container(
                    margin: const EdgeInsets.only(bottom: 12),
                    padding: const EdgeInsets.all(16),
                    decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(15),
                      boxShadow: [
                        BoxShadow(
                          color: Colors.black.withOpacity(0.05),
                          blurRadius: 10,
                          offset: const Offset(0, 5),
                        )
                      ],
                    ),
                    child: Row(
                      children: [

                        Icon(
                          task["done"]
                              ? Icons.check_circle
                              : Icons.circle_outlined,
                          color: task["done"] ? Colors.green : Colors.grey,
                        ),

                        const SizedBox(width: 10),

                        Expanded(
                          child: Text(
                            task["title"],
                            style: TextStyle(
                              fontSize: 16,
                              decoration: task["done"]
                                  ? TextDecoration.lineThrough
                                  : null,
                            ),
                          ),
                        ),

                        IconButton(
                          onPressed: () => _toggleTask(index),
                          icon: const Icon(Icons.swap_horiz),
                        )
                      ],
                    ),
                  );
                },
              ),
            ),
          ],
        ),
      ),
    );
  }
}