import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import OneHotEncoder, LabelEncoder
import pickle

# Load csv file
df = pd.read_csv('script/landmarks.csv')

# Seperate dependent and independent variables
X = df.iloc[:, 2:16].drop(columns=['elbow_correctness', 'hip_correctness', 'knee_correctness'])
y = df.iloc[:, 1]

# Encode target labels as integers
label_encoder = LabelEncoder()
y = label_encoder.fit_transform(y)

# Split train and test data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 42)

# Define which columns are categorical (first 8 columns: 'exercise', 'difficulty')
categorical_columns = list(range(2)) + list(range(8, 11))

# Create ColumnTransformer: OneHotEncode the categorical columns and leave numerical columns as is
preprocessor = ColumnTransformer(
    transformers = [
        ('categories', OneHotEncoder(), categorical_columns)
    ], remainder = 'passthrough'  # Leave numerical columns unchanged
)

# Create a pipeline with preprocessing and classifier steps
pipeline = Pipeline(steps = [
    ('preprocessor', preprocessor),
    ('classifier', RandomForestClassifier())
])

# Fit the model on the training data
pipeline.fit(X_train, y_train)

# Save the trained pipeline to a file
with open('script/model.pkl', 'wb') as f:
    pickle.dump(pipeline, f)