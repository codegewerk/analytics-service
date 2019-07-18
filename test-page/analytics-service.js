function AnalyticsService({ endpoint, fetchMode } = {}) {
  endpoint = endpoint || "https://analytics.codegewerk.de/";
  fetchMode = fetchMode || "cors";

  this.sendData = async function() {
    console.log("endpoint: ", endpoint, ", fetch-mode: ", fetchMode);

    let data = { platform: navigator.platform, userAgent: navigator.userAgent };

    const result = await fetch(endpoint, {
      method: "POST",
      mode: fetchMode,
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    });

    console.log(result);

    return result;
  };
}
