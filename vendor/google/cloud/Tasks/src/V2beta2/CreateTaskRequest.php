<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tasks/v2beta2/cloudtasks.proto

namespace Google\Cloud\Tasks\V2beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask].
 *
 * Generated from protobuf message <code>google.cloud.tasks.v2beta2.CreateTaskRequest</code>
 */
class CreateTaskRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The queue name. For example:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
     * The queue must already exist.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The task to add.
     * Task names have the following format:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`.
     * The user can optionally specify a task [name][google.cloud.tasks.v2beta2.Task.name]. If a
     * name is not specified then the system will generate a random
     * unique task id, which will be set in the task returned in the
     * [response][google.cloud.tasks.v2beta2.Task.name].
     * If [schedule_time][google.cloud.tasks.v2beta2.Task.schedule_time] is not set or is in the
     * past then Cloud Tasks will set it to the current time.
     * Task De-duplication:
     * Explicitly specifying a task ID enables task de-duplication.  If
     * a task's ID is identical to that of an existing task or a task
     * that was deleted or completed recently then the call will fail
     * with [ALREADY_EXISTS][google.rpc.Code.ALREADY_EXISTS].
     * If the task's queue was created using Cloud Tasks, then another task with
     * the same name can't be created for ~1hour after the original task was
     * deleted or completed. If the task's queue was created using queue.yaml or
     * queue.xml, then another task with the same name can't be created
     * for ~9days after the original task was deleted or completed.
     * Because there is an extra lookup cost to identify duplicate task
     * names, these [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] calls have significantly
     * increased latency. Using hashed strings for the task id or for
     * the prefix of the task id is recommended. Choosing task ids that
     * are sequential or have sequential prefixes, for example using a
     * timestamp, causes an increase in latency and error rates in all
     * task commands. The infrastructure relies on an approximately
     * uniform distribution of task ids to store and serve tasks
     * efficiently.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task task = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $task = null;
    /**
     * The response_view specifies which subset of the [Task][google.cloud.tasks.v2beta2.Task] will be
     * returned.
     * By default response_view is [BASIC][google.cloud.tasks.v2beta2.Task.View.BASIC]; not all
     * information is retrieved by default because some data, such as
     * payloads, might be desirable to return only when needed because
     * of its large size or because of the sensitivity of data that it
     * contains.
     * Authorization for [FULL][google.cloud.tasks.v2beta2.Task.View.FULL] requires
     * `cloudtasks.tasks.fullView` [Google IAM](https://cloud.google.com/iam/)
     * permission on the [Task][google.cloud.tasks.v2beta2.Task] resource.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task.View response_view = 3;</code>
     */
    private $response_view = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The queue name. For example:
     *           `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
     *           The queue must already exist.
     *     @type \Google\Cloud\Tasks\V2beta2\Task $task
     *           Required. The task to add.
     *           Task names have the following format:
     *           `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`.
     *           The user can optionally specify a task [name][google.cloud.tasks.v2beta2.Task.name]. If a
     *           name is not specified then the system will generate a random
     *           unique task id, which will be set in the task returned in the
     *           [response][google.cloud.tasks.v2beta2.Task.name].
     *           If [schedule_time][google.cloud.tasks.v2beta2.Task.schedule_time] is not set or is in the
     *           past then Cloud Tasks will set it to the current time.
     *           Task De-duplication:
     *           Explicitly specifying a task ID enables task de-duplication.  If
     *           a task's ID is identical to that of an existing task or a task
     *           that was deleted or completed recently then the call will fail
     *           with [ALREADY_EXISTS][google.rpc.Code.ALREADY_EXISTS].
     *           If the task's queue was created using Cloud Tasks, then another task with
     *           the same name can't be created for ~1hour after the original task was
     *           deleted or completed. If the task's queue was created using queue.yaml or
     *           queue.xml, then another task with the same name can't be created
     *           for ~9days after the original task was deleted or completed.
     *           Because there is an extra lookup cost to identify duplicate task
     *           names, these [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] calls have significantly
     *           increased latency. Using hashed strings for the task id or for
     *           the prefix of the task id is recommended. Choosing task ids that
     *           are sequential or have sequential prefixes, for example using a
     *           timestamp, causes an increase in latency and error rates in all
     *           task commands. The infrastructure relies on an approximately
     *           uniform distribution of task ids to store and serve tasks
     *           efficiently.
     *     @type int $response_view
     *           The response_view specifies which subset of the [Task][google.cloud.tasks.v2beta2.Task] will be
     *           returned.
     *           By default response_view is [BASIC][google.cloud.tasks.v2beta2.Task.View.BASIC]; not all
     *           information is retrieved by default because some data, such as
     *           payloads, might be desirable to return only when needed because
     *           of its large size or because of the sensitivity of data that it
     *           contains.
     *           Authorization for [FULL][google.cloud.tasks.v2beta2.Task.View.FULL] requires
     *           `cloudtasks.tasks.fullView` [Google IAM](https://cloud.google.com/iam/)
     *           permission on the [Task][google.cloud.tasks.v2beta2.Task] resource.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Tasks\V2Beta2\Cloudtasks::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The queue name. For example:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
     * The queue must already exist.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The queue name. For example:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
     * The queue must already exist.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The task to add.
     * Task names have the following format:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`.
     * The user can optionally specify a task [name][google.cloud.tasks.v2beta2.Task.name]. If a
     * name is not specified then the system will generate a random
     * unique task id, which will be set in the task returned in the
     * [response][google.cloud.tasks.v2beta2.Task.name].
     * If [schedule_time][google.cloud.tasks.v2beta2.Task.schedule_time] is not set or is in the
     * past then Cloud Tasks will set it to the current time.
     * Task De-duplication:
     * Explicitly specifying a task ID enables task de-duplication.  If
     * a task's ID is identical to that of an existing task or a task
     * that was deleted or completed recently then the call will fail
     * with [ALREADY_EXISTS][google.rpc.Code.ALREADY_EXISTS].
     * If the task's queue was created using Cloud Tasks, then another task with
     * the same name can't be created for ~1hour after the original task was
     * deleted or completed. If the task's queue was created using queue.yaml or
     * queue.xml, then another task with the same name can't be created
     * for ~9days after the original task was deleted or completed.
     * Because there is an extra lookup cost to identify duplicate task
     * names, these [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] calls have significantly
     * increased latency. Using hashed strings for the task id or for
     * the prefix of the task id is recommended. Choosing task ids that
     * are sequential or have sequential prefixes, for example using a
     * timestamp, causes an increase in latency and error rates in all
     * task commands. The infrastructure relies on an approximately
     * uniform distribution of task ids to store and serve tasks
     * efficiently.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task task = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Tasks\V2beta2\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Required. The task to add.
     * Task names have the following format:
     * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`.
     * The user can optionally specify a task [name][google.cloud.tasks.v2beta2.Task.name]. If a
     * name is not specified then the system will generate a random
     * unique task id, which will be set in the task returned in the
     * [response][google.cloud.tasks.v2beta2.Task.name].
     * If [schedule_time][google.cloud.tasks.v2beta2.Task.schedule_time] is not set or is in the
     * past then Cloud Tasks will set it to the current time.
     * Task De-duplication:
     * Explicitly specifying a task ID enables task de-duplication.  If
     * a task's ID is identical to that of an existing task or a task
     * that was deleted or completed recently then the call will fail
     * with [ALREADY_EXISTS][google.rpc.Code.ALREADY_EXISTS].
     * If the task's queue was created using Cloud Tasks, then another task with
     * the same name can't be created for ~1hour after the original task was
     * deleted or completed. If the task's queue was created using queue.yaml or
     * queue.xml, then another task with the same name can't be created
     * for ~9days after the original task was deleted or completed.
     * Because there is an extra lookup cost to identify duplicate task
     * names, these [CreateTask][google.cloud.tasks.v2beta2.CloudTasks.CreateTask] calls have significantly
     * increased latency. Using hashed strings for the task id or for
     * the prefix of the task id is recommended. Choosing task ids that
     * are sequential or have sequential prefixes, for example using a
     * timestamp, causes an increase in latency and error rates in all
     * task commands. The infrastructure relies on an approximately
     * uniform distribution of task ids to store and serve tasks
     * efficiently.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task task = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Tasks\V2beta2\Task $var
     * @return $this
     */
    public function setTask($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Tasks\V2beta2\Task::class);
        $this->task = $var;

        return $this;
    }

    /**
     * The response_view specifies which subset of the [Task][google.cloud.tasks.v2beta2.Task] will be
     * returned.
     * By default response_view is [BASIC][google.cloud.tasks.v2beta2.Task.View.BASIC]; not all
     * information is retrieved by default because some data, such as
     * payloads, might be desirable to return only when needed because
     * of its large size or because of the sensitivity of data that it
     * contains.
     * Authorization for [FULL][google.cloud.tasks.v2beta2.Task.View.FULL] requires
     * `cloudtasks.tasks.fullView` [Google IAM](https://cloud.google.com/iam/)
     * permission on the [Task][google.cloud.tasks.v2beta2.Task] resource.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task.View response_view = 3;</code>
     * @return int
     */
    public function getResponseView()
    {
        return $this->response_view;
    }

    /**
     * The response_view specifies which subset of the [Task][google.cloud.tasks.v2beta2.Task] will be
     * returned.
     * By default response_view is [BASIC][google.cloud.tasks.v2beta2.Task.View.BASIC]; not all
     * information is retrieved by default because some data, such as
     * payloads, might be desirable to return only when needed because
     * of its large size or because of the sensitivity of data that it
     * contains.
     * Authorization for [FULL][google.cloud.tasks.v2beta2.Task.View.FULL] requires
     * `cloudtasks.tasks.fullView` [Google IAM](https://cloud.google.com/iam/)
     * permission on the [Task][google.cloud.tasks.v2beta2.Task] resource.
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.Task.View response_view = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setResponseView($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Tasks\V2beta2\Task_View::class);
        $this->response_view = $var;

        return $this;
    }

}

