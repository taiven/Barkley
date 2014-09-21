<?php
class Anayltic{
	
	public function Statistics($statistic){
		switch ($statistic) {
		case 'tasks':
			echo "Retrieve number of tasks, completed, uncompleted, pending, average percentage of completed for overall project. The number of unassigned tasks.";
			break;
		case 'subtasks':
			echo "Retrieve number of subtasks for a given task, completed, uncompleted, pending, average percentage of completion for overall task.";
			break;
		case 'milestones':
			echo "Retrieve number of milestones for given project or task, milestones met, milestones unmet, average milestones completed per week/hour/month for given project.";
			break;
		case 'all':
			echo "Retrieve the overall percentage of completed tasks+subtasks+milestones/total amount of tasks/subtasks. Retrieves the overall percentage of uncompleted tasks and subtasks+unmet milestones.";
			break;
		}
	}
}
?>