<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/classification.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Model evaluation metrics for classification problems.
 * Note: For Video Classification this metrics only describe quality of the
 * Video Classification predictions of "segment_classification" type.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.ClassificationEvaluationMetrics</code>
 */
class ClassificationEvaluationMetrics extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The Area Under Precision-Recall Curve metric. Micro-averaged
     * for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_prc = 1;</code>
     */
    private $au_prc = 0.0;
    /**
     * Output only. The Area Under Precision-Recall Curve metric based on priors.
     * Micro-averaged for the overall evaluation.
     * Deprecated.
     *
     * Generated from protobuf field <code>float base_au_prc = 2 [deprecated = true];</code>
     */
    private $base_au_prc = 0.0;
    /**
     * Output only. The Area Under Receiver Operating Characteristic curve metric.
     * Micro-averaged for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_roc = 6;</code>
     */
    private $au_roc = 0.0;
    /**
     * Output only. The Log Loss metric.
     *
     * Generated from protobuf field <code>float log_loss = 7;</code>
     */
    private $log_loss = 0.0;
    /**
     * Output only. Metrics for each confidence_threshold in
     * 0.00,0.05,0.10,...,0.95,0.96,0.97,0.98,0.99 and
     * position_threshold = INT32_MAX_VALUE.
     * ROC and precision-recall curves, and other aggregated metrics are derived
     * from them. The confidence metrics entries may also be supplied for
     * additional values of position_threshold, but from these no aggregated
     * metrics are computed.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfidenceMetricsEntry confidence_metrics_entry = 3;</code>
     */
    private $confidence_metrics_entry;
    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for MULTICLASS classification problems where number
     * of labels is no more than 10.
     * Only set for model level evaluation, not for evaluation per label.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 4;</code>
     */
    private $confusion_matrix = null;
    /**
     * Output only. The annotation spec ids used for this evaluation.
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 5;</code>
     */
    private $annotation_spec_id;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $au_prc
     *           Output only. The Area Under Precision-Recall Curve metric. Micro-averaged
     *           for the overall evaluation.
     *     @type float $base_au_prc
     *           Output only. The Area Under Precision-Recall Curve metric based on priors.
     *           Micro-averaged for the overall evaluation.
     *           Deprecated.
     *     @type float $au_roc
     *           Output only. The Area Under Receiver Operating Characteristic curve metric.
     *           Micro-averaged for the overall evaluation.
     *     @type float $log_loss
     *           Output only. The Log Loss metric.
     *     @type \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfidenceMetricsEntry[]|\Google\Protobuf\Internal\RepeatedField $confidence_metrics_entry
     *           Output only. Metrics for each confidence_threshold in
     *           0.00,0.05,0.10,...,0.95,0.96,0.97,0.98,0.99 and
     *           position_threshold = INT32_MAX_VALUE.
     *           ROC and precision-recall curves, and other aggregated metrics are derived
     *           from them. The confidence metrics entries may also be supplied for
     *           additional values of position_threshold, but from these no aggregated
     *           metrics are computed.
     *     @type \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix $confusion_matrix
     *           Output only. Confusion matrix of the evaluation.
     *           Only set for MULTICLASS classification problems where number
     *           of labels is no more than 10.
     *           Only set for model level evaluation, not for evaluation per label.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $annotation_spec_id
     *           Output only. The annotation spec ids used for this evaluation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Classification::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The Area Under Precision-Recall Curve metric. Micro-averaged
     * for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_prc = 1;</code>
     * @return float
     */
    public function getAuPrc()
    {
        return $this->au_prc;
    }

    /**
     * Output only. The Area Under Precision-Recall Curve metric. Micro-averaged
     * for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_prc = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setAuPrc($var)
    {
        GPBUtil::checkFloat($var);
        $this->au_prc = $var;

        return $this;
    }

    /**
     * Output only. The Area Under Precision-Recall Curve metric based on priors.
     * Micro-averaged for the overall evaluation.
     * Deprecated.
     *
     * Generated from protobuf field <code>float base_au_prc = 2 [deprecated = true];</code>
     * @return float
     */
    public function getBaseAuPrc()
    {
        return $this->base_au_prc;
    }

    /**
     * Output only. The Area Under Precision-Recall Curve metric based on priors.
     * Micro-averaged for the overall evaluation.
     * Deprecated.
     *
     * Generated from protobuf field <code>float base_au_prc = 2 [deprecated = true];</code>
     * @param float $var
     * @return $this
     */
    public function setBaseAuPrc($var)
    {
        GPBUtil::checkFloat($var);
        $this->base_au_prc = $var;

        return $this;
    }

    /**
     * Output only. The Area Under Receiver Operating Characteristic curve metric.
     * Micro-averaged for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_roc = 6;</code>
     * @return float
     */
    public function getAuRoc()
    {
        return $this->au_roc;
    }

    /**
     * Output only. The Area Under Receiver Operating Characteristic curve metric.
     * Micro-averaged for the overall evaluation.
     *
     * Generated from protobuf field <code>float au_roc = 6;</code>
     * @param float $var
     * @return $this
     */
    public function setAuRoc($var)
    {
        GPBUtil::checkFloat($var);
        $this->au_roc = $var;

        return $this;
    }

    /**
     * Output only. The Log Loss metric.
     *
     * Generated from protobuf field <code>float log_loss = 7;</code>
     * @return float
     */
    public function getLogLoss()
    {
        return $this->log_loss;
    }

    /**
     * Output only. The Log Loss metric.
     *
     * Generated from protobuf field <code>float log_loss = 7;</code>
     * @param float $var
     * @return $this
     */
    public function setLogLoss($var)
    {
        GPBUtil::checkFloat($var);
        $this->log_loss = $var;

        return $this;
    }

    /**
     * Output only. Metrics for each confidence_threshold in
     * 0.00,0.05,0.10,...,0.95,0.96,0.97,0.98,0.99 and
     * position_threshold = INT32_MAX_VALUE.
     * ROC and precision-recall curves, and other aggregated metrics are derived
     * from them. The confidence metrics entries may also be supplied for
     * additional values of position_threshold, but from these no aggregated
     * metrics are computed.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfidenceMetricsEntry confidence_metrics_entry = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getConfidenceMetricsEntry()
    {
        return $this->confidence_metrics_entry;
    }

    /**
     * Output only. Metrics for each confidence_threshold in
     * 0.00,0.05,0.10,...,0.95,0.96,0.97,0.98,0.99 and
     * position_threshold = INT32_MAX_VALUE.
     * ROC and precision-recall curves, and other aggregated metrics are derived
     * from them. The confidence metrics entries may also be supplied for
     * additional values of position_threshold, but from these no aggregated
     * metrics are computed.
     *
     * Generated from protobuf field <code>repeated .google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfidenceMetricsEntry confidence_metrics_entry = 3;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfidenceMetricsEntry[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setConfidenceMetricsEntry($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfidenceMetricsEntry::class);
        $this->confidence_metrics_entry = $arr;

        return $this;
    }

    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for MULTICLASS classification problems where number
     * of labels is no more than 10.
     * Only set for model level evaluation, not for evaluation per label.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 4;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix
     */
    public function getConfusionMatrix()
    {
        return $this->confusion_matrix;
    }

    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for MULTICLASS classification problems where number
     * of labels is no more than 10.
     * Only set for model level evaluation, not for evaluation per label.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 4;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix $var
     * @return $this
     */
    public function setConfusionMatrix($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics_ConfusionMatrix::class);
        $this->confusion_matrix = $var;

        return $this;
    }

    /**
     * Output only. The annotation spec ids used for this evaluation.
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAnnotationSpecId()
    {
        return $this->annotation_spec_id;
    }

    /**
     * Output only. The annotation spec ids used for this evaluation.
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 5;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAnnotationSpecId($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->annotation_spec_id = $arr;

        return $this;
    }

}

