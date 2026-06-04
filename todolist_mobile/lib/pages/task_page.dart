import 'package:flutter/material.dart';
import 'login_page.dart';

class TaskPage extends StatefulWidget {
  const TaskPage({super.key});

  @override
  State<TaskPage> createState() => _TaskPageState();
}

class _TaskPageState extends State<TaskPage> {

  List tasks = [
    {
      "title": "Belajar Flutter",
      "description": "Mempelajari state management",
      "date": DateTime.now(),
      "status": "pending"
    },
  ];

  void _addTask(String title, String desc, DateTime date, String status) {
    setState(() {
      tasks.add({
        "title": title,
        "description": desc,
        "date": date,
        "status": status,
      });
    });
  }

  void _toggleStatus(int index) {
    setState(() {
      final current = tasks[index]["status"];

      tasks[index]["status"] =
          current == "pending"
              ? "in_progress"
              : current == "in_progress"
                  ? "completed"
                  : "pending";
    });
  }

  String formatDate(DateTime date) {
    return "${date.day}/${date.month}/${date.year}";
  }

  Color statusColor(String status) {
    switch (status) {
      case "completed":
        return Colors.green;
      case "in_progress":
        return Colors.orange;
      default:
        return Colors.grey;
    }
  }

  String statusLabel(String status) {
    switch (status) {
      case "completed":
        return "Completed";
      case "in_progress":
        return "In Progress";
      default:
        return "Pending";
    }
  }

  void _showAddTask() {
    final titleC = TextEditingController();
    final descC = TextEditingController();
    DateTime selectedDate = DateTime.now();
    String status = "pending";

    showModalBottomSheet(
      context: context,
      isScrollControlled: true,
      shape: const RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(top: Radius.circular(20)),
      ),
      builder: (context) {
        return StatefulBuilder(
          builder: (context, setModalState) {
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
                    style: TextStyle(
                        fontSize: 18, fontWeight: FontWeight.bold),
                  ),

                  const SizedBox(height: 10),

                  // TITLE
                  TextField(
                    controller: titleC,
                    decoration: const InputDecoration(
                      labelText: "Title",
                      border: OutlineInputBorder(),
                    ),
                  ),

                  const SizedBox(height: 10),

                  // DESCRIPTION
                  TextField(
                    controller: descC,
                    maxLines: 2,
                    decoration: const InputDecoration(
                      labelText: "Description",
                      border: OutlineInputBorder(),
                    ),
                  ),

                  const SizedBox(height: 10),

                  // DATE PICKER
                  Row(
                    children: [
                      Expanded(
                        child: Text(
                          "Date: ${formatDate(selectedDate)}",
                        ),
                      ),
                      TextButton(
                        onPressed: () async {
                          final picked = await showDatePicker(
                            context: context,
                            initialDate: selectedDate,
                            firstDate: DateTime(2020),
                            lastDate: DateTime(2100),
                          );

                          if (picked != null) {
                            setModalState(() {
                              selectedDate = picked;
                            });
                          }
                        },
                        child: const Text("Pick Date"),
                      )
                    ],
                  ),

                  // STATUS DROPDOWN
                  DropdownButtonFormField<String>(
                    value: status,
                    items: const [
                      DropdownMenuItem(
                          value: "pending", child: Text("Pending")),
                      DropdownMenuItem(
                          value: "in_progress", child: Text("In Progress")),
                      DropdownMenuItem(
                          value: "completed", child: Text("Completed")),
                    ],
                    onChanged: (value) {
                      if (value != null) {
                        setModalState(() {
                          status = value;
                        });
                      }
                    },
                    decoration: const InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: "Status",
                    ),
                  ),

                  const SizedBox(height: 15),

                  SizedBox(
                    width: double.infinity,
                    child: ElevatedButton(
                      onPressed: () {
                        if (titleC.text.isNotEmpty) {
                          _addTask(
                            titleC.text,
                            descC.text,
                            selectedDate,
                            status,
                          );
                          Navigator.pop(context);
                        }
                      },
                      child: const Text("Add Task"),
                    ),
                  ),

                  const SizedBox(height: 20),
                ],
              ),
            );
          },
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF6F7FB),

      appBar: AppBar(
        title: const Text("Dashboard"),
        actions: [
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

      floatingActionButton: FloatingActionButton(
        onPressed: _showAddTask,
        child: const Icon(Icons.add),
      ),

      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [

            const Align(
              alignment: Alignment.centerLeft,
              child: Text(
                "My Tasks",
                style: TextStyle(
                    fontSize: 22, fontWeight: FontWeight.bold),
              ),
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
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [

                        // TITLE + STATUS
                        Row(
                          mainAxisAlignment:
                              MainAxisAlignment.spaceBetween,
                          children: [

                            Expanded(
                              child: Text(
                                task["title"],
                                style: const TextStyle(
                                  fontSize: 16,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ),

                            Container(
                              padding: const EdgeInsets.symmetric(
                                  horizontal: 10, vertical: 5),
                              decoration: BoxDecoration(
                                color:
                                    statusColor(task["status"])
                                        .withOpacity(0.2),
                                borderRadius:
                                    BorderRadius.circular(10),
                              ),
                              child: Text(
                                statusLabel(task["status"]),
                                style: TextStyle(
                                  color:
                                      statusColor(task["status"]),
                                  fontSize: 12,
                                ),
                              ),
                            ),
                          ],
                        ),

                        const SizedBox(height: 6),

                        // DESC
                        Text(
                          task["description"],
                          style: const TextStyle(
                              color: Colors.grey),
                        ),

                        const SizedBox(height: 6),

                        // DATE
                        Text(
                          formatDate(task["date"]),
                          style: const TextStyle(
                              fontSize: 12,
                              color: Colors.grey),
                        ),

                        const SizedBox(height: 10),

                        Align(
                          alignment: Alignment.centerRight,
                          child: TextButton(
                            onPressed: () => _toggleStatus(index),
                            child: const Text("Change Status"),
                          ),
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