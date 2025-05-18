from textblob import TextBlob

# Define a sample sentence
sentence = "Pangit mo"

# Create a TextBlob object
blob = TextBlob(sentence)

# Perform sentiment analysis
sentiment = blob.sentiment

# Print the results
print(f"Sentiment polarity: {sentiment.polarity}")
print(f"Sentiment subjectivity: {sentiment.subjectivity}")