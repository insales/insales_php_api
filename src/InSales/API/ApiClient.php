<?php

namespace InSales\API;

use InSales\API\Traits\{Account,
    Article,
    ApplicationCharge,
    ApplicationWidget,
    Blog,
    Category,
    Client,
    ClientGroup,
    Collect,
    Collection,
    CollectionFieldValue,
    CollectionFilter,
    CustomStatus,
    DeliveryVariant,
    DiscountCode,
    Domain,
    ExternalDiscount,
    Field,
    File,
    Image,
    InvitedAccount,
    JsTags,
    OptionName,
    OptionValue,
    Order,
    Product,
    ProductField,
    ProductFieldValue,
    Property,
    PaymentGateway,
    PropertyCharacteristic,
    Review,
    Similar,
    StockCurrency,
    Supplementary,
    Testing,
    Variant,
    VariantField,
    VariantFieldValue,
    WebHook,
    PaymentNotify};
use InSales\Http\Client as HttpClient;

/**
 * Class ApiClient
 * @package InSales
 */
class ApiClient
{
    use
        Account, Article, Order, ApplicationCharge, ApplicationWidget,
        Blog,
        Category, Client, ClientGroup, Collection, Collect, CollectionFieldValue, CollectionFilter, CustomStatus,
        DeliveryVariant, DiscountCode, ExternalDiscount, Domain,
        Field, File,
        Image, InvitedAccount,
        JsTags,
        OptionName, OptionValue,
        Product, Property, PaymentGateway, PropertyCharacteristic, ProductField, ProductFieldValue,
        Review,
        Similar, StockCurrency, Supplementary,
        Variant, VariantField, VariantFieldValue,
        WebHook,
        Testing,
        PaymentNotify;

    const API_URL_ACCOUNT = '/admin/account';
    const API_URL_APPLICATION_CHARGES = '/admin/application_charges';
    const API_URL_APPLICATION_WIDGET = '/admin/application_widgets';
    const API_URL_ARTICLE = '/admin/blogs/{slug}/articles';
    const API_URL_BLOGS = '/admin/blogs';
    const API_URL_CATEGORY = '/admin/categories';
    const API_URL_CHARACTERISTIC = '/admin/properties/{slug}/characteristics';
    const API_URL_PROPERTY = '/admin/properties';
    const API_URL_CLIENT = '/admin/clients';
    const API_URL_CLIENT_GROUP = '/admin/client_groups';
    const API_URL_ORDERS = '/admin/orders';
    const API_URL_PRODUCTS = '/admin/products';
    const API_URL_PRODUCTS_COUNT = '/admin/products/count';
    const API_URL_CUSTOM_STATUSES = '/admin/custom_statuses';
    const API_URL_DELIVERY_VARIANTS = '/admin/delivery_variants';
    const API_URL_PAYMENT_GATEWAYS = '/admin/payment_gateways';
    const API_URL_COLLECTIONS = '/admin/collections';
    const API_URL_COLLECTS = '/admin/collects';
    const API_URL_COLLECTION_FIELD_VALUES = '/admin/collections/{slug}/collection_field_values';
    const API_URL_COLLECTION_FILTERS = '/admin/collection_filters';
    const API_URL_DISCOUNT_CODES = '/admin/discount_codes';
    const API_URL_EXTERNAL_DISCOUNT = '/admin/external_discounts';
    const API_URL_DOMAINS = '/admin/domains';
    const API_URL_FIELDS = '/admin/fields';
    const API_URL_FILES = '/admin/files';
    const API_URL_IMAGES = '/admin/products/{slug}/images';
    const API_URL_INVITED_ACCOUNTS = '/admin/invited_accounts';
    const API_URL_JS_TAGS = '/admin/js_tags';
    const API_URL_OPTION_NAMES = '/admin/option_names';
    const API_URL_OPTION_VALUES = '/admin/option_names/{slug}/option_values';
    const API_URL_PRODUCT_FIELD = '/admin/product_fields';
    const API_URL_PRODUCT_FIELD_VALUE = '/admin/products/{slug}/product_field_values';
    const API_URL_REVIEW = '/admin/reviews';
    const API_URL_SIMILAR = '/admin/products/{slug}/similars';
    const API_URL_STOCK_CURRENCY = '/admin/stock_currencies';
    const API_URL_STOCK_SUPLEMENTARY = '/admin/products/{slug}/supplementaries';
    const API_URL_VARIANT = '/admin/products/{slug}/variants';
    const API_URL_VARIANT_FIELD = '/admin/variant_fields';
    const API_URL_VARIANT_FIELD_VALUE = '/admin/products/{slug}/variant_field_values';
    const API_URL_WEBHOOK = '/admin/webhooks';
    const PAYMENT_URL_NOTIFY = '/payments/external/server';

    /** @var HttpClient */
    private $client;

    /**
     * Инициализация Клиента
     * @param string $identity Идентификатор
     * @param string $password Пароль
     * @param string $hostName Адрес магазина
     */
    public function __construct(string $identity, string $password, string $hostName)
    {
        $this->client = new HttpClient($identity, $password, $hostName);
    }

    /**
     * Генерация URL для API
     * @param string $url Базовый URL
     * @param integer | null $id Идентификатор записи
     * @return string
     */
    private function generateUrl(string $url, $id = null) : string
    {
        if ($id === null) {
            $result = $this->client->getBaseUrl() . $url . '.json';
        } else {
            $result = $this->client->getBaseUrl() . $url . '/' . $id . '.json';
        }
        return $result;
    }


    /**
     * Генерация двусложного URL для API
     * @param string $url Базовый URL
     * @param int $slug Идентификатор родительской записи
     * @param null $id Идентификатор записи
     * @return string
     */
    private function generateCompoundUrl(string $url, int $slug, $id = null) : string
    {
        $baseUrl = str_replace('{slug}', $slug, $url);
        return $this->generateUrl($baseUrl, $id);
    }

}
