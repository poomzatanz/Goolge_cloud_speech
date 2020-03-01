<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/secrets/v1beta1/service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\SecretManager\V1beta1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\GetPolicyOptions;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\Cloud\SecretManager\V1beta1\AccessSecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\AccessSecretVersionResponse;
use Google\Cloud\SecretManager\V1beta1\AddSecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\CreateSecretRequest;
use Google\Cloud\SecretManager\V1beta1\DeleteSecretRequest;
use Google\Cloud\SecretManager\V1beta1\DestroySecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\DisableSecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\EnableSecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\GetSecretRequest;
use Google\Cloud\SecretManager\V1beta1\GetSecretVersionRequest;
use Google\Cloud\SecretManager\V1beta1\ListSecretVersionsRequest;
use Google\Cloud\SecretManager\V1beta1\ListSecretVersionsResponse;
use Google\Cloud\SecretManager\V1beta1\ListSecretsRequest;
use Google\Cloud\SecretManager\V1beta1\ListSecretsResponse;
use Google\Cloud\SecretManager\V1beta1\Secret;
use Google\Cloud\SecretManager\V1beta1\SecretPayload;
use Google\Cloud\SecretManager\V1beta1\SecretVersion;
use Google\Cloud\SecretManager\V1beta1\UpdateSecretRequest;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: Secret Manager Service.
 *
 * Manages secrets and operations using those secrets. Implements a REST
 * model with the following objects:
 *
 * * [Secret][google.cloud.secrets.v1beta1.Secret]
 * * [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion]
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $secretManagerServiceClient = new SecretManagerServiceClient();
 * try {
 *     $formattedParent = $secretManagerServiceClient->projectName('[PROJECT]');
 *     // Iterate over pages of elements
 *     $pagedResponse = $secretManagerServiceClient->listSecrets($formattedParent);
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *
 *
 *     // Alternatively:
 *
 *     // Iterate through all elements
 *     $pagedResponse = $secretManagerServiceClient->listSecrets($formattedParent);
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $secretManagerServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class SecretManagerServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.secrets.v1beta1.SecretManagerService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'secretmanager.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $projectNameTemplate;
    private static $secretNameTemplate;
    private static $secretVersionNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/secret_manager_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/secret_manager_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/secret_manager_service_grpc_config.json',
            'credentialsConfig' => [
                'scopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/secret_manager_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getProjectNameTemplate()
    {
        if (null == self::$projectNameTemplate) {
            self::$projectNameTemplate = new PathTemplate('projects/{project}');
        }

        return self::$projectNameTemplate;
    }

    private static function getSecretNameTemplate()
    {
        if (null == self::$secretNameTemplate) {
            self::$secretNameTemplate = new PathTemplate('projects/{project}/secrets/{secret}');
        }

        return self::$secretNameTemplate;
    }

    private static function getSecretVersionNameTemplate()
    {
        if (null == self::$secretVersionNameTemplate) {
            self::$secretVersionNameTemplate = new PathTemplate('projects/{project}/secrets/{secret}/versions/{secret_version}');
        }

        return self::$secretVersionNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'project' => self::getProjectNameTemplate(),
                'secret' => self::getSecretNameTemplate(),
                'secretVersion' => self::getSecretVersionNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     * @experimental
     */
    public static function projectName($project)
    {
        return self::getProjectNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a secret resource.
     *
     * @param string $project
     * @param string $secret
     *
     * @return string The formatted secret resource.
     * @experimental
     */
    public static function secretName($project, $secret)
    {
        return self::getSecretNameTemplate()->render([
            'project' => $project,
            'secret' => $secret,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a secret_version resource.
     *
     * @param string $project
     * @param string $secret
     * @param string $secretVersion
     *
     * @return string The formatted secret_version resource.
     * @experimental
     */
    public static function secretVersionName($project, $secret, $secretVersion)
    {
        return self::getSecretVersionNameTemplate()->render([
            'project' => $project,
            'secret' => $secret,
            'secret_version' => $secretVersion,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - project: projects/{project}
     * - secret: projects/{project}/secrets/{secret}
     * - secretVersion: projects/{project}/secrets/{secret}/versions/{secret_version}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'secretmanager.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Lists [Secrets][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedParent = $secretManagerServiceClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $secretManagerServiceClient->listSecrets($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $secretManagerServiceClient->listSecrets($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the project associated with the
     *                             [Secrets][google.cloud.secrets.v1beta1.Secret], in the format `projects/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listSecrets($parent, array $optionalArgs = [])
    {
        $request = new ListSecretsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListSecrets',
            $optionalArgs,
            ListSecretsResponse::class,
            $request
        );
    }

    /**
     * Creates a new [Secret][google.cloud.secrets.v1beta1.Secret] containing no [SecretVersions][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedParent = $secretManagerServiceClient->projectName('[PROJECT]');
     *     $secretId = '';
     *     $response = $secretManagerServiceClient->createSecret($formattedParent, $secretId);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the project to associate with the
     *                             [Secret][google.cloud.secrets.v1beta1.Secret], in the format `projects/*`.
     * @param string $secretId     Required. This must be unique within the project.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type Secret $secret
     *          A [Secret][google.cloud.secrets.v1beta1.Secret] with initial field values.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\Secret
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createSecret($parent, $secretId, array $optionalArgs = [])
    {
        $request = new CreateSecretRequest();
        $request->setParent($parent);
        $request->setSecretId($secretId);
        if (isset($optionalArgs['secret'])) {
            $request->setSecret($optionalArgs['secret']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateSecret',
            Secret::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a new [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] containing secret data and attaches
     * it to an existing [Secret][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedParent = $secretManagerServiceClient->secretName('[PROJECT]', '[SECRET]');
     *     $payload = new SecretPayload();
     *     $response = $secretManagerServiceClient->addSecretVersion($formattedParent, $payload);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string        $parent       Required. The resource name of the [Secret][google.cloud.secrets.v1beta1.Secret] to associate with the
     *                                    [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] in the format `projects/&#42;/secrets/*`.
     * @param SecretPayload $payload      Required. The secret payload of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     * @param array         $optionalArgs {
     *                                    Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\SecretVersion
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function addSecretVersion($parent, $payload, array $optionalArgs = [])
    {
        $request = new AddSecretVersionRequest();
        $request->setParent($parent);
        $request->setPayload($payload);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'AddSecretVersion',
            SecretVersion::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets metadata for a given [Secret][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretName('[PROJECT]', '[SECRET]');
     *     $response = $secretManagerServiceClient->getSecret($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [Secret][google.cloud.secrets.v1beta1.Secret], in the format `projects/&#42;/secrets/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\Secret
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getSecret($name, array $optionalArgs = [])
    {
        $request = new GetSecretRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetSecret',
            Secret::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates metadata of an existing [Secret][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $secret = new Secret();
     *     $updateMask = new FieldMask();
     *     $response = $secretManagerServiceClient->updateSecret($secret, $updateMask);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param Secret    $secret       Required. [Secret][google.cloud.secrets.v1beta1.Secret] with updated field values.
     * @param FieldMask $updateMask   Required. Specifies the fields to be updated.
     * @param array     $optionalArgs {
     *                                Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\Secret
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateSecret($secret, $updateMask, array $optionalArgs = [])
    {
        $request = new UpdateSecretRequest();
        $request->setSecret($secret);
        $request->setUpdateMask($updateMask);

        $requestParams = new RequestParamsHeaderDescriptor([
          'secret.name' => $request->getSecret()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateSecret',
            Secret::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a [Secret][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretName('[PROJECT]', '[SECRET]');
     *     $secretManagerServiceClient->deleteSecret($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [Secret][google.cloud.secrets.v1beta1.Secret] to delete in the format
     *                             `projects/&#42;/secrets/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteSecret($name, array $optionalArgs = [])
    {
        $request = new DeleteSecretRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteSecret',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists [SecretVersions][google.cloud.secrets.v1beta1.SecretVersion]. This call does not return secret
     * data.
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedParent = $secretManagerServiceClient->secretName('[PROJECT]', '[SECRET]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $secretManagerServiceClient->listSecretVersions($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $secretManagerServiceClient->listSecretVersions($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The resource name of the [Secret][google.cloud.secrets.v1beta1.Secret] associated with the
     *                             [SecretVersions][google.cloud.secrets.v1beta1.SecretVersion] to list, in the format
     *                             `projects/&#42;/secrets/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listSecretVersions($parent, array $optionalArgs = [])
    {
        $request = new ListSecretVersionsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListSecretVersions',
            $optionalArgs,
            ListSecretVersionsResponse::class,
            $request
        );
    }

    /**
     * Gets metadata for a [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * `projects/&#42;/secrets/&#42;/versions/latest` is an alias to the `latest`
     * [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretVersionName('[PROJECT]', '[SECRET]', '[SECRET_VERSION]');
     *     $response = $secretManagerServiceClient->getSecretVersion($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] in the format
     *                             `projects/&#42;/secrets/&#42;/versions/*`.
     *                             `projects/&#42;/secrets/&#42;/versions/latest` is an alias to the `latest`
     *                             [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\SecretVersion
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getSecretVersion($name, array $optionalArgs = [])
    {
        $request = new GetSecretVersionRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetSecretVersion',
            SecretVersion::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Accesses a [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion]. This call returns the secret data.
     *
     * `projects/&#42;/secrets/&#42;/versions/latest` is an alias to the `latest`
     * [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretVersionName('[PROJECT]', '[SECRET]', '[SECRET_VERSION]');
     *     $response = $secretManagerServiceClient->accessSecretVersion($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] in the format
     *                             `projects/&#42;/secrets/&#42;/versions/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\AccessSecretVersionResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function accessSecretVersion($name, array $optionalArgs = [])
    {
        $request = new AccessSecretVersionRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'AccessSecretVersion',
            AccessSecretVersionResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Disables a [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sets the [state][google.cloud.secrets.v1beta1.SecretVersion.state] of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to
     * [DISABLED][google.cloud.secrets.v1beta1.SecretVersion.State.DISABLED].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretVersionName('[PROJECT]', '[SECRET]', '[SECRET_VERSION]');
     *     $response = $secretManagerServiceClient->disableSecretVersion($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to disable in the format
     *                             `projects/&#42;/secrets/&#42;/versions/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\SecretVersion
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function disableSecretVersion($name, array $optionalArgs = [])
    {
        $request = new DisableSecretVersionRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DisableSecretVersion',
            SecretVersion::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Enables a [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sets the [state][google.cloud.secrets.v1beta1.SecretVersion.state] of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to
     * [ENABLED][google.cloud.secrets.v1beta1.SecretVersion.State.ENABLED].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretVersionName('[PROJECT]', '[SECRET]', '[SECRET_VERSION]');
     *     $response = $secretManagerServiceClient->enableSecretVersion($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to enable in the format
     *                             `projects/&#42;/secrets/&#42;/versions/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\SecretVersion
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function enableSecretVersion($name, array $optionalArgs = [])
    {
        $request = new EnableSecretVersionRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'EnableSecretVersion',
            SecretVersion::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Destroys a [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion].
     *
     * Sets the [state][google.cloud.secrets.v1beta1.SecretVersion.state] of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to
     * [DESTROYED][google.cloud.secrets.v1beta1.SecretVersion.State.DESTROYED] and irrevocably destroys the
     * secret data.
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $formattedName = $secretManagerServiceClient->secretVersionName('[PROJECT]', '[SECRET]', '[SECRET_VERSION]');
     *     $response = $secretManagerServiceClient->destroySecretVersion($formattedName);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name of the [SecretVersion][google.cloud.secrets.v1beta1.SecretVersion] to destroy in the format
     *                             `projects/&#42;/secrets/&#42;/versions/*`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\SecretManager\V1beta1\SecretVersion
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function destroySecretVersion($name, array $optionalArgs = [])
    {
        $request = new DestroySecretVersionRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DestroySecretVersion',
            SecretVersion::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Sets the access control policy on the specified secret. Replaces any
     * existing policy.
     *
     * Permissions on [SecretVersions][google.cloud.secrets.v1beta1.SecretVersion] are enforced according
     * to the policy set on the associated [Secret][google.cloud.secrets.v1beta1.Secret].
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $resource = '';
     *     $policy = new Policy();
     *     $response = $secretManagerServiceClient->setIamPolicy($resource, $policy);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being specified.
     *                             See the operation documentation for the appropriate value for this field.
     * @param Policy $policy       REQUIRED: The complete policy to be applied to the `resource`. The size of
     *                             the policy is limited to a few 10s of KB. An empty policy is a
     *                             valid policy but certain Cloud Platform services (such as Projects)
     *                             might reject them.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function setIamPolicy($resource, $policy, array $optionalArgs = [])
    {
        $request = new SetIamPolicyRequest();
        $request->setResource($resource);
        $request->setPolicy($policy);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'SetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the access control policy for a secret.
     * Returns empty policy if the secret exists and does not have a policy set.
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $resource = '';
     *     $response = $secretManagerServiceClient->getIamPolicy($resource);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string $resource     REQUIRED: The resource for which the policy is being requested.
     *                             See the operation documentation for the appropriate value for this field.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type GetPolicyOptions $options
     *          OPTIONAL: A `GetPolicyOptions` object for specifying options to
     *          `GetIamPolicy`. This field is only used by Cloud IAM.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\Policy
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getIamPolicy($resource, array $optionalArgs = [])
    {
        $request = new GetIamPolicyRequest();
        $request->setResource($resource);
        if (isset($optionalArgs['options'])) {
            $request->setOptions($optionalArgs['options']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetIamPolicy',
            Policy::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns permissions that a caller has for the specified secret.
     * If the secret does not exist, this call returns an empty set of
     * permissions, not a NOT_FOUND error.
     *
     * Note: This operation is designed to be used for building permission-aware
     * UIs and command-line tools, not for authorization checking. This operation
     * may "fail open" without warning.
     *
     * Sample code:
     * ```
     * $secretManagerServiceClient = new SecretManagerServiceClient();
     * try {
     *     $resource = '';
     *     $permissions = [];
     *     $response = $secretManagerServiceClient->testIamPermissions($resource, $permissions);
     * } finally {
     *     $secretManagerServiceClient->close();
     * }
     * ```
     *
     * @param string   $resource     REQUIRED: The resource for which the policy detail is being requested.
     *                               See the operation documentation for the appropriate value for this field.
     * @param string[] $permissions  The set of permissions to check for the `resource`. Permissions with
     *                               wildcards (such as '*' or 'storage.*') are not allowed. For more
     *                               information see
     *                               [IAM Overview](https://cloud.google.com/iam/docs/overview#permissions).
     * @param array    $optionalArgs {
     *                               Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Iam\V1\TestIamPermissionsResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function testIamPermissions($resource, $permissions, array $optionalArgs = [])
    {
        $request = new TestIamPermissionsRequest();
        $request->setResource($resource);
        $request->setPermissions($permissions);

        $requestParams = new RequestParamsHeaderDescriptor([
          'resource' => $request->getResource(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'TestIamPermissions',
            TestIamPermissionsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}